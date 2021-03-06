<?php

namespace TokyoAPI\Model;

class Manager
{    
    /**
     * Connexion à la base de données
     *
     * @return object
     */
    public function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=tokyo;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $db;
        } catch (\PDOException $exception) {
            die('Erreur SQL : '.$exception->getMessage());
        }
    }
}
