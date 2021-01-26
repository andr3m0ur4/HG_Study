<?php

    namespace Controllers;

    use Core\Controller;

    class ContactController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('contact', $data);
        }
    }
