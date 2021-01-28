<?php

    namespace Controllers;

    use Core\Controller;
    use Models\User;

    class RegisterController extends Controller
    {
        public function index()
        {
            $success = null;
            $error = false;

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                if ($this->validateFields()) {
                    $name = addslashes($_POST['name']);
                    $last_name = addslashes($_POST['last_name']);
                    $email = addslashes($_POST['email']);
                    $password = md5(addslashes($_POST['password']));
                    $city = addslashes($_POST['city']);
                    $state = addslashes($_POST['state']);

                    $user = new User();

                    if ($user->insert($name, $last_name, $email, $password, $city, $state)) {
                        $success = true;
                    } else {
                        $success = false;
                    }
                } else {
                    $error = true;
                }
            }

            $data = [
                'success' => $success,
                'error' => $error
            ];

            $this->loadTemplate('register', $data);
        }

        private function validateFields()
        {
            foreach ($_POST as $key) {
                if (empty($key)) {
                    return false;
                }
            }

            return true;
        }
    }
