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

        public function getTotal()
        {
            $sql = "SELECT COUNT(*) AS counter FROM users";
            $sql = $this->db->query($sql);
            $sql = $sql->fetch(\PDO::FETCH_OBJ);

            return $sql->counter;
        }
    }
    