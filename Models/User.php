<?php

    namespace Models;

    use Core\Model;

    class User extends Model
    {
        public function getAll($offset = 0, $limit = 10)
        {
            $array = [];

            $sql = "SELECT * FROM users LIMIT $offset, $limit";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function get($id)
        {
            $array = [];

            $sql = "SELECT * FROM users WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getTotal()
        {
            $sql = "SELECT COUNT(*) AS counter FROM users";
            $sql = $this->db->query($sql);
            $sql = $sql->fetch(\PDO::FETCH_OBJ);

            return $sql->counter;
        }

        public function login($email, $password)
        {
            $sql = "SELECT id, name FROM users WHERE email = :email AND password = :password";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $password);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(\PDO::FETCH_OBJ);
                $_SESSION['id'] = $data->id;
                $_SESSION['name'] = $data->name;

                return true;
            }

            return false;
        }

        public function insert($name, $last_name, $email, $password, $city, $state)
        {
            if (!$this->verifyEmail($email)) {
                $sql = "INSERT INTO users (name, last_name, email, password, city, state)
                VALUES (:name, :last_name, :email, :password, :city, :state)";

                $sql = $this->db->prepare($sql);
                $sql->bindValue(':name', $name);
                $sql->bindValue(':last_name', $last_name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':password', $password);
                $sql->bindValue(':city', $city);
                $sql->bindValue(':state', $state);
                $sql->execute();

                return true;
            }
            
            return false;
        }

        private function verifyEmail($email)
        {
            $sql = "SELECT email FROM users WHERE email = :email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            }

            return false;
        }
    }
    