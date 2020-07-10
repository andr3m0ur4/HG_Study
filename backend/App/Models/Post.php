<?php

    namespace App\Models;

    use Lib\Model\Model;

    class Post extends Model
    {
        public function __get($attr)
        {
            return $attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }

        public static function get()
        {
            $query = 'SELECT * FROM posts';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }

        public static function find($id)
        {
            $query = '
                SELECT 
                    p.*,
                    u.name,
                    u.last_name,
                    u.biography,
                    u.facebook,
                    u.twitter,
                    u.instagram,
                    u.github,
                    u.picture AS picture_user
                FROM posts AS p
                INNER JOIN users AS u
                ON(p.id_user = u.id)
                WHERE p.id = :id
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject(__CLASS__);
        }

        public static function create($data)
        {
            $query = '
                INSERT INTO posts (title, content, quote, content2, picture, id_user)
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

        public function update($data)
        {
            foreach ($data as $key => $value) {
                $this->__set($key, $value);
            }

            $query = '
                UPDATE posts
                SET
                    title = :title,
                    content = :content,
                    quote = :quote,
                    content2 = :content2,
                    picture = :picture
                WHERE id = :id
            ';

            $stmt  =PARENT::$db->prepare($query);
            $stmt->bindValue(':title', $this->title);
            $stmt->bindValue(':content', $this->content);
            $stmt->bindValue(':quote', $this->quote);
            $stmt->bindValue(':content2', $this->content2);
            $stmt->bindValue(':picture', $this->picture);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt;
        }

        public function delete()
        {
            $query = 'DELETE FROM posts WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt;
        }
    }
