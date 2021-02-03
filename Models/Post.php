<?php

    namespace Models;

    use Core\Model;

    class Post extends Model
    {
        public function getAll($offset = 0, $limit = 5)
        {
            $array = [];

            $sql = "SELECT
                    p.*, DATE_FORMAT(p.date_create, '%d/%m/%Y') AS date_create, u.name, u.last_name
                FROM posts AS p
                INNER JOIN users AS u ON p.id_user = u.id
                ORDER BY p.date_create DESC
                LIMIT $offset, $limit";

            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function get($id)
        {
            $array = [];

            $sql = "SELECT
                    p.*, DATE_FORMAT(p.date_create, '%d/%m/%Y') AS date_create,
                    u.name, u.last_name, u.description, u.picture AS user_picture
                FROM posts AS p
                INNER JOIN users AS u ON p.id_user = u.id
                WHERE p.id = :id";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getIdUser($id)
        {
            $id_user = 0;

            $sql = "SELECT id_user FROM posts WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $id_user = $sql->fetch(\PDO::FETCH_OBJ)->id_user;
            }

            return $id_user;
        }

        public function getTotal()
        {
            $sql = "SELECT COUNT(*) AS counter FROM posts";
            $sql = $this->db->query($sql);
            $sql = $sql->fetch(\PDO::FETCH_OBJ);

            return $sql->counter;
        }

        public function insert($title, $content, $quote = '', $content2 = '', $picture)
        {
            $sql = "INSERT INTO posts (title, content, quote, content2, picture, id_user)
                VALUES (:title, :content, :quote, :content2, :picture, :id_user)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':content', $content);
            $sql->bindValue(':quote', $quote);
            $sql->bindValue(':content2', $content2);
            $sql->bindValue(':picture', $picture);
            $sql->bindValue(':id_user', $_SESSION['id']);
            $sql->execute();

            return true;
        }

        public function update($id, $title, $content, $quote = '', $content2 = '', $picture)
        {
            $sql = "UPDATE posts SET
                    title = :title,
                    content = :content,
                    quote = :quote,
                    content2 = :content2,
                    picture = :picture
                WHERE id = :id";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':content', $content);
            $sql->bindValue(':quote', $quote);
            $sql->bindValue(':content2', $content2);
            $sql->bindValue(':picture', $picture);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;
        }
    }
    