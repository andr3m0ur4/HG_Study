<?php

    namespace App\Models;

    use MF\Model\Model;

    class Post extends Model
    {
        public function __construct()
        {
            $this->host .= 'api/v1/posts/';
        }

        public function get()
        {
            $url = $this->host . 'list';

            $ch = curl_init($url);
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

        public function find($id)
        {
            $url = $this->host . 'list/' . $id;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            $result = json_decode(curl_exec($ch));

            return $this->cast($result, __CLASS__);
        }
    }
