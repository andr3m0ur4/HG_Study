<?php

    namespace Controllers;

    use Core\Controller;

    class AboutUsController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('about-us', $data);
        }
    }
