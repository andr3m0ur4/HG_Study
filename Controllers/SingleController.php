<?php

    namespace Controllers;

    use Core\Controller;
    use Models\User;

    class SingleController extends Controller
    {
        public function index($id = null)
        {
            if (is_null($id)) {
                header('Location: /users');
                exit;
            }
            
            $user = new User();

            $data = [
                'user' => $user->get($id),
                'id' => $_SESSION['id'] ?? null
            ];

            $this->loadTemplate('single', $data);
        }

        public function update()
        {
            if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
                header('Location: /login');
                exit;
            }

            $success = false;
            $error = false;
            $error_picture = false;
            $user = new User();

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $name = addslashes($_POST['name']);
                $last_name = addslashes($_POST['last_name']);
                $email = addslashes($_POST['email']);
                $new_email = addslashes($_POST['new_email']);
                $job = addslashes($_POST['job']);
                $description = addslashes($_POST['description']);
                $current_job = addslashes($_POST['current_job']);
                $city = addslashes($_POST['city']);
                $state = addslashes($_POST['state']);
                $facebook = addslashes($_POST['facebook']);
                $twitter = addslashes($_POST['twitter']);
                $linkedin = addslashes($_POST['linkedin']);
                $github = addslashes($_POST['github']);
                $picture = addslashes($_POST['picture']);
                $new_picture = $_FILES['new_picture'];

                $name_picture = $this->uploadPicture($new_picture, $picture);

                if (is_string($name_picture)) {
                    $picture = $name_picture;
                } elseif ($name_picture === false) {
                    $error_picture = true;
                }

                if ($user->update(
                    $name,
                    $last_name,
                    $email,
                    $new_email,
                    $job,
                    $description,
                    $current_job,
                    $city,
                    $state,
                    $facebook,
                    $twitter,
                    $linkedin,
                    $github,
                    $picture
                )) {
                    $success = true;
                } else {
                    $error = true;
                }
            }

            $data = [
                'user' => $user->get($_SESSION['id']),
                'error' => $error,
                'error_picture' => $error_picture,
                'success' => $success
            ];

            $this->loadTemplate('single-update', $data);
        }

        public function updatePassword()
        {
            if (isset($_POST['password']) && !empty($_POST['password'])) {
                $password = md5(addslashes($_POST['password']));
                $new_password = addslashes($_POST['new_password']);
                $new_password2 = addslashes($_POST['new_password2']);

                $user = new User();

                if ($user->verifyPassword($password)) {
                    if ($new_password === $new_password2) {
                        $user->updatePassword(md5($new_password));

                        echo 1;
                        exit;
                    }

                    echo 2;
                    exit;
                }

                echo 3;
                exit;
            }
        }

        private function uploadPicture($picture, $old_picture)
        {
            if (!empty($picture['tmp_name'])) {
                if ($picture['type'] == 'image/jpeg') {
                    $name = md5(time() . rand(0, 9999)) . '.jpg';
                } elseif ($picture['type'] == 'image/png') {
                    $name = md5(time() . rand(0, 9999)) . '.png';
                } else {
                    return false;
                }

                move_uploaded_file($picture['tmp_name'], "./img/user/$name");

                @unlink("./img/user/$old_picture");

                return $name;
            }
        }
    }
