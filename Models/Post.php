<?php

    namespace Models;

    use Core\Model;

    class Post extends Model
    {
        public function getAll($offset = 0, $limit = 5)
        {
            $array = [];

            $sql = "SELECT p.*, u.name, u.last_name FROM posts AS p
                INNER JOIN users AS u ON p.id_user = u.id
                LIMIT $offset, $limit";

            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getTotal()
        {
            $sql = "SELECT COUNT(*) AS counter FROM posts";
            $sql = $this->db->query($sql);
            $sql = $sql->fetch(\PDO::FETCH_OBJ);

            return $sql->counter;
        }
    }
    