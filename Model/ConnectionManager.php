<?php

namespace TokyoAPI\Model; // La classe sera dans ce namespace

require_once('model/Manager.php');
require_once('Entity/User.php');
require_once('Entity/Location.php');

class ConnectionManager {

    public function connection($account) {
        //  Récupération de l'utilisateur et de son pass haché
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('SELECT id, user_role, pass FROM member WHERE pseudo = :pseudo');
        $login = $req->execute(array(
            "pseudo"=> $account->getPseudo()
        ));
        $login = $req->fetch();
        return $login;
    }     
}
