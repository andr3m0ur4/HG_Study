<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Post;

    class BlogSingleController extends Controller
    {
        public function index($id = null)
        {
            if (is_null($id)) {
                header('Location: /blog-home');
                exit;
            }

            $post = new Post();

            $data = [
                'post' => $post->get($id)
            ];

            $this->loadTemplate('blog-single', $data);
        }
    }
