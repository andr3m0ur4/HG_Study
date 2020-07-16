<?php

    namespace App\Models;

    use MF\Model\Model;

    class Comment extends Model
    {
        public function __construct()
        {
            $this->host .= 'api/v1/comments/';
        }

        public function get($id)
        {
            $url = $this->host . 'list/' . $id;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);

            $results = json_decode(curl_exec($ch));
            $comments = [];

            foreach ($results as $result) {
                $comments[] = $this->cast($result, __CLASS__);
            }

            return $comments;
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
