<?php

    namespace Controllers;

    use Core\Controller;

    class UsersController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('users', $data);
        }
    }
