<?php

    namespace Controllers;

    use Core\Controller;

    class SearchController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('search', $data);
        }
    }
