<?php

    namespace Models;

    use Core\Model;

    class Comment extends Model
    {
        public function get($id)
        {
            $array = [];

            $sql = "SELECT
                    c.*, DATE_FORMAT(c.date_create, '%M %d, %Y às %H:%i') AS date_create,
                    u.id AS id_user, u.name, u.last_name, u.picture
                FROM comments AS c
                INNER JOIN users AS u ON u.id = id_user
                WHERE id_post = :id AND id_comment IS NULL
                ORDER BY c.date_create DESC";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            for ($i = 0; $i < count($array); $i++) {
                $array[$i]->comments = $this->getComments($array[$i]->id);
            }

            return $array;
        }

        private function getComments($id)
        {
            $array = [];

            $sql = "SELECT
                    c.*, DATE_FORMAT(c.date_create, '%M %d, %Y às %H:%i') AS date_create,
                    u.id AS id_user, u.name, u.last_name, u.picture
                FROM comments AS c
                INNER JOIN users AS u ON u.id = id_user
                WHERE id_comment = :id_comment";
            
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_comment', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getLastComment()
        {
            $data = [];

            $sql = "SELECT
                    c.*, DATE_FORMAT(c.date_create, '%M %d, %Y às %H:%i') AS date_create,
                    u.id AS id_user, u.name, u.last_name, u.picture
                FROM comments AS c
                INNER JOIN users AS u ON u.id = id_user
                WHERE id_user = :id_user
                ORDER BY c.date_create DESC";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_user', $_SESSION['id']);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(\PDO::FETCH_OBJ);
            }

            return $data;
        }

        public function insert($message, $id_post, $id_comment = null)
        {
            $sql = "INSERT INTO comments
                (message, id_post, id_user, id_comment)
                VALUES (:message, :id_post, :id_user, :id_comment)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':message', $message);
            $sql->bindValue(':id_post', $id_post);
            $sql->bindValue(':id_user', $_SESSION['id']);
            $sql->bindValue(':id_comment', $id_comment);

            return $sql->execute();
        }
    }
