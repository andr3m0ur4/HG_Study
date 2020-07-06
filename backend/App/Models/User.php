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
    }
    