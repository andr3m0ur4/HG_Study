<?php

    namespace Controllers;

    use Core\Controller;

    class LoginController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('login', $data);
        }
    }
