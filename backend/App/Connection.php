<?php

    namespace App;

    class Connection
    {
        public static function getDb($db)
        {
            try {

                $conn = new \PDO(
                    "{$db['driver']}:host={$db['host']};dbname={$db['database']};charset={$db['charset']}",
                    "{$db['username']}",
                    "{$db['password']}"
                );

                return $conn;
            } catch (\PDOException $e) {
                // Tratar o erro
                return $e->getMessage();
            }
        }
    }
