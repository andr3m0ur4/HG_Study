<?php

    namespace Controllers;

    use Core\Controller;
    use Models\User;

    class LoginController extends Controller
    {
        public function index()
        {
            $error = false;

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                if ($this->validateFields()) {
                    $email = addslashes($_POST['email']);
                    $password = md5(addslashes($_POST['password']));

                    $user = new User();

                    if ($user->login($email, $password)) {
                        header("Location: /single/{$_SESSION['id']}");
                        exit;
                    }

                    $error = true;
                } else {
                    $error = true;
                }
            }

            $data = [
                'error' => $error
            ];

            $this->loadTemplate('login', $data);
        }

        public function logout()
        {
            session_unset();
            header('Location: /login');
        }
    }
