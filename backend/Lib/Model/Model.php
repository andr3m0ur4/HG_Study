<?php

    namespace Lib\Model;

    abstract class Model
    {
        protected static $db;

        public static function setDb(\PDO $db)
        {
            SELF::$db = $db;
        }
    }
