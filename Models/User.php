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

                if ($sql->execute()) {
                    return true;
                }
            }
            
            return false;
        }

        public function update(
            $name,
            $last_name,
            $email,
            $new_email,
            $job,
            $description,
            $current_job,
            $city,
            $state,
            $facebook,
            $twitter,
            $linkedin,
            $github,
            $picture
        ) {
            if (!empty($new_email) && $email != $new_email) {
                if (!$this->verifyEmail($new_email)) {
                    $email = $new_email;
                } else {
                    return false;
                }
            }

            $sql = "UPDATE users SET
                    name = :name,
                    last_name = :last_name,
                    email = :email,
                    job = :job,
                    description = :description,
                    current_job = :current_job,
                    city = :city,
                    state = :state,
                    facebook = :facebook,
                    twitter = :twitter,
                    linkedin = :linkedin,
                    github = :github,
                    picture = :picture
                WHERE id = :id";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':last_name', $last_name);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':job', $job);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':current_job', $current_job);
            $sql->bindValue(':city', $city);
            $sql->bindValue(':state', $state);
            $sql->bindValue(':facebook', $facebook);
            $sql->bindValue(':twitter', $twitter);
            $sql->bindValue(':linkedin', $linkedin);
            $sql->bindValue(':github', $github);
            $sql->bindValue(':picture', $picture);
            $sql->bindValue(':id', $_SESSION['id']);
            
            if ($sql->execute()) {
                return true;
            }

            return false;
        }

        public function updatePassword($password)
        {
            $sql = "UPDATE users SET password = :password WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':password', $password);
            $sql->bindValue(':id', $_SESSION['id']);
            
            if ($sql->execute()) {
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

        public function verifyPassword($password)
        {
            $result = false;

            $sql = "SELECT password FROM users WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $_SESSION['id']);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $result = $password == $sql->fetch(\PDO::FETCH_OBJ)->password;
            }

            return $result;
        }
    }
    