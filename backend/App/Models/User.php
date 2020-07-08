<?php

    namespace App\Models;

    use Lib\Model\Model;

    class User extends Model
    {
        public static function get()
        {
            $query = 'SELECT * FROM users';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function getLeaders()
        {
            $query = 'SELECT * FROM users WHERE type_user = 1';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function find($id)
        {
            $query = 'SELECT * FROM users WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
    }
