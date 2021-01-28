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
            $user = new User();

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $name = addslashes($_POST['name']);
                $last_name = addslashes($_POST['last_name']);
                $email = addslashes($_POST['email']);
                $new_email = addslashes($_POST['new_email']);
                $password = addslashes($_POST['password']);
                $new_password = addslashes($_POST['new_password']);
                $job = addslashes($_POST['job']);
                $description = addslashes($_POST['description']);
                $current_job = addslashes($_POST['current_job']);
                $city = addslashes($_POST['city']);
                $state = addslashes($_POST['state']);
                $facebook = addslashes($_POST['facebook']);
                $twitter = addslashes($_POST['twitter']);
                $linkedin = addslashes($_POST['linkedin']);
                $github = addslashes($_POST['github']);

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
                    $github
                )) {
                    $success = true;
                } else {
                    $error = true;
                }
            }

            $data = [
                'user' => $user->get($_SESSION['id']),
                'error' => $error,
                'success' => $success
            ];

            $this->loadTemplate('single-update', $data);
        }
    }
