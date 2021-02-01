<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Post;
use stdClass;

class BlogSingleController extends Controller
    {
        public function index($id = null)
        {
            if (is_null($id)) {
                header('Location: /blog-home');
                exit;
            }

            $post = new Post();

            $data = [
                'post' => $post->get($id)
            ];

            $this->loadTemplate('blog-single', $data);
        }

        public function blogAdd()
        {
            if (!isset($_SESSION['id'])) {
                header('Location: /login');
                exit;
            }

            $error_picture = false;
            $success = false;

            $post = new stdClass();
            $post->title = '';
            $post->content = '';
            $post->quote = '';
            $post->content2 = '';

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

                $post->title = $title;
                $post->content = $content;
                $post->quote = $quote;
                $post->content2 = $content2;
            }

            $data = [
                'error_picture' => $error_picture,
                'success' => $success,
                'post' => $post
            ];

            $this->loadTemplate('blog-update', $data);
        }

        public function blogUpdate($id)
        {
            if (!isset($_SESSION['id'])) {
                header('Location: /login');
                exit;
            }

            $error_picture = false;
            $success = false;
            $post = new Post();
            $id_user = $post->getIdUser($id);

            if ($_SESSION['id'] != $id_user) {
                header('Location: /blog-home');
                exit;
            }

            if (isset($_POST['title']) && !empty($_POST['title'])) {
                $title = addslashes($_POST['title']);
                $content = addslashes($_POST['content']);
                $quote = addslashes($_POST['quote']);
                $content2 = addslashes($_POST['content2']);
                $picture = addslashes($_POST['picture']);
                $new_picture = $_FILES['new_picture'];

                $name_picture = $this->uploadPicture($new_picture, $picture);

                if (is_string($name_picture)) {
                    $picture = $name_picture;
                } elseif ($name_picture === false) {
                    $error_picture = true;
                }

                if (!$error_picture) {
                    $post->update($id, $title, $content, $quote, $content2, $picture);

                    $success = true;
                }
            }

            $data = [
                'post' => $post->get($id),
                'success' => $success,
                'error_picture' => $error_picture
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

                if ($old_picture != 'post.png') {
                    @unlink("./img/blog/$old_picture");
                }

                return $name;
            }
        }
    }
