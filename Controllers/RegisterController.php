<?php

    namespace Controllers;

    use Core\Controller;

    class RegisterController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('register', $data);
        }
    }
