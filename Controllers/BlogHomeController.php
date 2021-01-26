<?php

    namespace Controllers;

    use Core\Controller;

    class BlogHomeController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('blog-home', $data);
        }
    }
