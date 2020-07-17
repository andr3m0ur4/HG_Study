<?php

    namespace App\Models;

    use MF\Model\Model;

    class User extends Model
    {
        public function __construct()
        {
            $this->host .= 'api/v1/users/';
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }

        public function __get($attr)
        {
            return $this->$attr;
        }

        public function get()
        {
            $url = $this->host . 'list';

            $ch = curl_init($url);
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

        public function getExperiences($id)
        {
            $url = $this->host . 'experiences/' . $id;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            return json_decode(curl_exec($ch));
        }

        public function getProjects($id)
        {
            $url = $this->host . 'projects/' . $id;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            return json_decode(curl_exec($ch));
        }

        public function getCertificates($id)
        {
            $url = $this->host . 'certificates/' . $id;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            return json_decode(curl_exec($ch));
        }

        public function validateRegister()
		{
			$valid = true;

			if (strlen($this->__get('name')) < 3) {
				$valid = false;
            }
            
            if (strlen($this->__get('last_name')) < 3) {
				$valid = false;
			}

			if (strlen($this->__get('email')) < 3) {
				$valid = false;
			}

			if (strlen($this->__get('password')) < 3) {
				$valid = false;
			}

			return $valid;
        }
        
        public function verifyEmail()
        {
            $url = $this->host . 'verifyemail';

            $data = json_encode([
                'email' => $this->email
            ]);

            $header = ['Content-Type: application/json'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            return curl_exec($ch);
        }
    }
