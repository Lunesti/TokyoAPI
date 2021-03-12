<?php

namespace TokyoAPI\Model; // La classe sera dans ce namespace

require_once('model/Manager.php');
require_once('Entity/User.php');
require_once('Entity/Location.php');

class UserManager extends Manager
{
    
    /**
     * Ajouter un nouvel utilisateur
     *
     * @param  mixed $newUser
     * @return void
     */
    public function postUser($newUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO member(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $pass_hache = password_hash($newUser->getPass(), PASSWORD_DEFAULT);
        $addUser = $req->execute(array(
            "pseudo" => $newUser->getPseudo(),
            "pass" => $pass_hache,
            "email" => $newUser->getEmail()
        ));
        return $addUser;
    }
    
    /**
     * Récupération d'un utilisateur
     *
     * @param  mixed $user
     * @return void
     */
    public function getUser($user)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_role, pass FROM member WHERE pseudo = :pseudo');
        $login = $req->execute(array(
            "pseudo" => $user->getPseudo()
        ));
        $login = $req->fetch();
        return $login;
    }
}
