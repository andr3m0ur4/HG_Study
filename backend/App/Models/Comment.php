<?php

    namespace App\Models;

    use Lib\Model\Model;

    class Comment extends Model
    {
        public function __get($attr)
        {
            return $attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }

        public static function get($id)
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
                WHERE id_post = :id_post AND id_comment IS NULL
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_post', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
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
                WHERE c.id = :id
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject(__CLASS__);
        }

        public function getComments()
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
                WHERE id_comment = :id_comment
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_comment', $this->id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }

        public static function create($data)
        {
            $query = '
                INSERT INTO comments (message, id_post, id_user, id_comment)
                VALUES (:message, :id_post, :id_user, :id_comment)
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':message', $data->message);
            $stmt->bindValue(':id_post', $data->id_post);
            $stmt->bindValue(':id_user', $data->id_user);
            $stmt->bindValue(':id_comment', $data->id_comment);
            $stmt->execute();

            return SELF::find(PARENT::$db->lastInsertId());
        }

        public function update($data)
        {
            foreach ($data as $key => $value) {
                $this->__set($key, $value);
            }

            $query = '
                UPDATE comments
                SET
                    message = :message
                WHERE id = :id
            ';

            $stmt  =PARENT::$db->prepare($query);
            $stmt->bindValue(':message', $this->message);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt;
        }

        public function delete()
        {
            $query = 'DELETE FROM comments WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt;
        }
    }
