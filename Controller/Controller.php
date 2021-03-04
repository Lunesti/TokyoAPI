<?php
require_once('Model/UserManager.php');
require_once('Model/LocationManager.php');
require_once('Model/ConnectionManager.php');
require_once('Model/Entity/User.php');
require_once('Model/Entity/Location.php');


function subscribe($pseudo, $pass, $email) {  //Inscription
    $subscribe = new TokyoAPI\Model\User();
    $subscribe->setPseudo($pseudo);
    $subscribe->setPass($pass);
    $subscribe->setEmail($email);
    $membersManager = new TokyoAPI\Model\UserManager();
    $newUser = $membersManager->newUser($subscribe);
    require('View/frontend/homeView.php');
}

//Rediriger vers la page d'inscription
function subscribeView() {
    require('View/frontend/InscriptionView.php');
}

function connectUser($pseudo, $pass) {  //Connexion
    $newUser = new TokyoAPI\Model\User();
    $newUser->setPseudo($pseudo);
    $newUser->setPass($pass);

    $member = new TokyoAPI\Model\UserManager();
    $login = $member->connection($newUser);

    $isPasswordCorrect = password_verify($pass, $login['pass']);  
    if (!$isPasswordCorrect) {
        print "Mauvais identifiant ou mot de passe";
    } else {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_role'] = $login['user_role'];
        if ($_SESSION['user_role'] == 'user') {    
            require('View/frontend/homeView.php');
        } else {
             print "Si vous êtes un admin, veuillez utiliser votre espace dédié";
             $_SESSION = array();
             session_destroy();
        }
    }
}

function connectAdmin($pseudo, $pass) {
    $connected = new TokyoAPI\Model\User();
    $connected->setPseudo($pseudo);
    $connected->setPass($pass);

    $member = new TokyoAPI\Model\UserManager();
    $login = $member->connection($connected);

    $isPasswordCorrect = password_verify($pass, $login['pass']);  
    if (!$isPasswordCorrect) {
        print "Mauvais identifiant ou mot de passe";
    } else {         
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_role'] = $login['user_role'];
        if ($_SESSION['user_role'] == 'admin') {  
            header('Location:index.php?action=admin');
        } else{
            print "Vous n'êtes pas admin. Veuillez vous diriger vers le menu de connexion en haut du site pour vous connecter";
            $_SESSION = array();
            session_destroy();
        }
    }
}


function logOut() { //Deconnexion    
    $_SESSION = array();
    //setcookie('user', $_SESSION['username'], time() - 42000);
    session_destroy();
    require('View/frontend/homeView.php');
}

//Rediriger vers la page de connexion User
function userConnexion() {
    require('View/frontend/ConnectionUserView.php');
}

//Rediriger vers la page de connexion Admin
function adminConnexion() {
    require('View/frontend/ConnectionAdminView.php');
}


//Rediriger vers la page Admin
function adminPage() {
    $locationManager = new TokyoAPI\Model\LocationManager();
    $listLocations = $locationManager->getLocations();
    require('View/frontend/adminView.php');
}

