<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Post;
    use Models\User;

    class BlogHomeController extends Controller
    {
        public function index()
        {
            $posts = new Post();

            $limit = 5;
            $current_page = intval($_GET['p'] ?? 1);
            $current_page = $current_page > 0 ? $current_page : 1;
            $offset = ($current_page * $limit) - $limit;

            $total = $posts->getTotal();

            $data = [
                'posts' => $posts->getAll($offset, $limit),
                'pages' => ceil($total / $limit),
                'current_page' => $current_page
            ];

            $this->loadTemplate('blog-home', $data);
        }

        public function blogAdd()
        {
            if (!isset($_SESSION['id'])) {
                header('Location: /login');
                exit;
            }

            $error_picture = false;
            $success = false;

            if (isset($_POST['title']) && !empty($_POST['title'])) {
                $title = addslashes($_POST['title']);
                $content = addslashes($_POST['content']);
                $quote = addslashes($_POST['quote']);
                $content2 = addslashes($_POST['content2']);
                $picture = $_FILES['new_picture'];

                $name_picture = $this->uploadPicture($picture);

                if (is_string($name_picture)) {
                    $picture = $name_picture;
                } elseif ($name_picture === false) {
                    $error_picture = true;
                } else {
                    $picture = 'post.png';
                }

                if (!$error_picture) {
                    $post = new Post();
                    $post->insert($title, $content, $quote, $content2, $picture);

                    $success = true;
                }
            }

            $data = [
                'error_picture' => $error_picture,
                'success' => $success
            ];

            $this->loadTemplate('blog-update', $data);
        }

        private function uploadPicture($picture, $old_picture = '')
        {
            if (!empty($picture['tmp_name'])) {
                if ($picture['type'] == 'image/jpeg') {
                    $name = md5(time() . rand(0, 9999)) . '.jpg';
                } elseif ($picture['type'] == 'image/png') {
                    $name = md5(time() . rand(0, 9999)) . '.png';
                } else {
                    return false;
                }

                move_uploaded_file($picture['tmp_name'], "./img/blog/$name");

                //@unlink("./img/user/$old_picture");

                return $name;
            }
        }
    }
