<?php

namespace TokyoAPI\Model; // La classe sera dans ce namespace

require_once('model/Manager.php');
require_once('Entity/User.php');
require_once('Entity/Location.php');
require_once('Entity/Post.php');
require_once('Entity/Image.php');

class UserManager {

    public function newUser($user) {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('INSERT INTO member(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $pass_hache = password_hash($user->getPass(), PASSWORD_DEFAULT);
        $subscribe = $req->execute(array(
            "pseudo"=> $user->getPseudo(),
            "pass"=> $pass_hache,
            "email"=> $user->getEmail()
        ));
        return $subscribe;
    }

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


