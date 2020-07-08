<?php

    namespace Lib\Model;

    class Error
    {
        public static function getError($error)
        {
            return $error->getMessage();
        }
    }
    