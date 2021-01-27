<?php

    namespace Controllers;

    use Core\Controller;
    use Models\User;

    class HomeController extends Controller
    {
        public function index()
        {
            $data = [];

            $users = new User();
            $data['users'] = $users->getAll();

            $this->loadTemplate('home', $data);
        }
    }
