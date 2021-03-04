<?php


namespace TokyoAPI\Model;

class User {

  private $id;
  private $pseudo;
  private $user_role;
  private $pass;
  private $email;
  private $inscription_date;


  /*Getters*/

    public function getId() {
        return $this->id;
    }

    public function getPseudo() {
      return $this->pseudo;
    }

    public function getUserRole() {
        return $this->user_role;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDate() {
        return $this->inscription_date;
    }

    /*Setters*/

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setUserRole($user_role) {
        $this->user_role = $user_role;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }


    public function setEmail($email) {
        $this->email = $email;
    }


    public function setDate($Date) {
        $this->inscription_date = $date;
    }

}