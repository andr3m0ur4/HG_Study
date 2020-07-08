<?php

    namespace App\Models;

    use Lib\Model\Model;

    class Comment extends Model
    {
        public static function get($id)
        {
            $query = '
                SELECT c.*, u.name, u.picture
                FROM comments AS c
                INNER JOIN users AS u
                ON(c.id_user = u.id)
                WHERE id_post = :id_post';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_post', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
    }
