<?php

    namespace App\Models;

    use Lib\Model\Model;

    class Comment extends Model
    {
        public static function get($id)
        {
            $query = '
                SELECT
                    c.*,
                    u.name,
                    u.last_name
                    u.picture
                FROM comments AS c
                INNER JOIN users AS u
                ON(c.id_user = u.id)
                WHERE id_post = :id_post';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_post', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function find($id)
        {
            $query = '
                SELECT 
                    c.*,
                    u.name,
                    u.last_name,
                    u.picture
                FROM comments AS c
                INNER JOIN users AS u
                ON(c.id_user = u.id)
                WHERE c.id = :id AND c.id_post = :id_post
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':id_post', $id_post);
            $stmt->execute();

            return $stmt->fetchObject(__CLASS__);
        }

        public static function create($data)
        {
            $query = '
                INSERT INTO comments (message, content, quote, content2, picture, id_user)
                VALUES (:title, :content, :quote, :content2, :picture, :id_user)
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':title', $data->title);
            $stmt->bindValue(':content', $data->content);
            $stmt->bindValue(':quote', $data->quote);
            $stmt->bindValue(':content2', $data->content2);
            $stmt->bindValue(':picture', $data->picture);
            $stmt->bindValue(':id_user', $data->id_user);
            $stmt->execute();

            return SELF::find(PARENT::$db->lastInsertId());
        }
    }
