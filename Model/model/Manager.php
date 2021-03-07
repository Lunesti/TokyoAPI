<?php

namespace TokyoAPI\Model;

class Manager
{
    public function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=tokyo;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $db;
        } catch (\PDOException $exception) {
            die('Erreur : '.$exception->getMessage());
        }
    }
}
