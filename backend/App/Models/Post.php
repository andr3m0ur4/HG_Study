<?php

    namespace App\Models;

    use Lib\Model\Model;

    class Post extends Model
    {
        public static function get()
        {
            $query = 'SELECT * FROM posts';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function find($id)
        {
            $query = '
                SELECT p.*, u.*, u.picture AS picture_user
                FROM posts AS p
                INNER JOIN users AS u
                ON(p.id_user = u.id)
                WHERE p.id = :id
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
    }
