<?php

    namespace Controllers;

    use Core\Controller;

    class SingleController extends Controller
    {
        public function index()
        {
            $data = [];

            $this->loadTemplate('single', $data);
        }

        public function update()
        {
            $data = [];

            $this->loadTemplate('single-update', $data);
        }
    }
