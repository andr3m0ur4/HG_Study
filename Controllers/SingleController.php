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
                'user' => $user->get($id)
            ];

            $this->loadTemplate('single', $data);
        }

        public function update()
        {
            $data = [];

            $this->loadTemplate('single-update', $data);
        }
    }
