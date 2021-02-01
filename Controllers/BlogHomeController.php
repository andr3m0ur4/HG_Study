<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Post;
    use Models\User;

    class BlogHomeController extends Controller
    {
        public function index()
        {
            $posts = new Post();

            $limit = 5;
            $current_page = intval($_GET['p'] ?? 1);
            $current_page = $current_page > 0 ? $current_page : 1;
            $offset = ($current_page * $limit) - $limit;

            $total = $posts->getTotal();

            $data = [
                'posts' => $posts->getAll($offset, $limit),
                'pages' => ceil($total / $limit),
                'current_page' => $current_page
            ];

            $this->loadTemplate('blog-home', $data);
        }
    }
