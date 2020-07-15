<?php

    namespace App\Models;

    use MF\Model\Model;

    class User extends Model
    {
        public function __construct()
        {
            $this->url .= 'api/v1/users/';
        }

        public function get()
        {
            $this->url .= 'list';

            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);

            $results = json_decode(curl_exec($ch));
            $users = [];

            foreach ($results as $result) {
                $users[] = $this->cast($result, __CLASS__);
            }

            return $users;
        }
    }