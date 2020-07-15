<?php

    namespace App\Models;

    use MF\Model\Model;

    class Post extends Model
    {
        public function __construct()
        {
            $this->url .= 'api/v1/posts/';
        }

        public function get()
        {
            $this->url .= 'list';

            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);

            $results = json_decode(curl_exec($ch));
            $posts = [];

            foreach ($results as $result) {
                $posts[] = $this->cast($result, __CLASS__);
            }

            return $posts;
        }
    }