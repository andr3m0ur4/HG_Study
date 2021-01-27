<?php

    namespace Controllers;

    use Core\Controller;
    use Models\User;

    class UsersController extends Controller
    {
        public function index()
        {
            $users = new User();

            $limit = 7;
            $current_page = intval($_GET['p'] ?? 1);
            $current_page = $current_page > 0 ? $current_page : 1;
            $offset = ($current_page * $limit) - $limit;

            $total = $users->getTotal();

            $data = [
                'users' => $users->getAll($offset, $limit),
                'pages' => ceil($total / $limit),
                'current_page' => $current_page
            ];

            $this->loadTemplate('users', $data);
        }
    }
