<?php

    namespace App\Models;

    use MF\Model\Model;

    class User extends Model
    {
        private $url = 'http://10.0.0.104:8080/api/v1/users/';

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