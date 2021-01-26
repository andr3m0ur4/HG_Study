<?php

    namespace Controllers;

    use Core\Controller;

    class BlogSingleController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('blog-single', $data);
        }
    }
