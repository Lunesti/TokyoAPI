<?php
require_once('Model/UserManager.php');
require_once('Model/LocationManager.php');
require_once('Model/Entity/User.php');
require_once('Model/Entity/Location.php');


function signUp($pseudo, $pass, $email)
{
    $user = new TokyoAPI\Model\User();
    $user->setPseudo($pseudo);
    $user->setPass($pass);
    $user->setEmail($email);
    $membersManager = new TokyoAPI\Model\UserManager();
    $newUser = $membersManager->postUser($user);
    require('View/frontend/homeView.php');
}

function signUpView()
{
    require('View/frontend/signUpView.php');
}

function signInUser($pseudo, $pass)
{
    $loginInformation = new TokyoAPI\Model\User();
    $loginInformation->setPseudo($pseudo);
    $loginInformation->setPass($pass);

    $member = new TokyoAPI\Model\UserManager();
    $login = $member->getUser($loginInformation);

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

function signInAdmin($pseudo, $pass)
{
    $loginInformation = new TokyoAPI\Model\User();
    $loginInformation->setPseudo($pseudo);
    $loginInformation->setPass($pass);

    $member = new TokyoAPI\Model\UserManager();
    $login = $member->getUser($loginInformation);

    $isPasswordCorrect = password_verify($pass, $login['pass']);
    if (!$isPasswordCorrect) {
        print "Mauvais identifiant ou mot de passe";
    } else {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_role'] = $login['user_role'];
        if ($_SESSION['user_role'] == 'admin') {
            header('Location:index.php?action=admin');
        } else {
            print "Vous n'êtes pas admin. Veuillez vous diriger vers le menu de connexion en haut du site pour vous connecter";
            $_SESSION = array();
            session_destroy();
        }
    }
}


function logOut()
{
    $_SESSION = array();
    session_destroy();
    require('View/frontend/homeView.php');
}

function signInUserPage()
{
    require('View/frontend/signInUserView.php');
}

function signInAdminPage()
{
    require('View/frontend/signInAdminView.php');
}

function adminPage()
{
    $locationManager = new TokyoAPI\Model\LocationManager();
    $listLocations = $locationManager->getLocations();
    require('View/frontend/adminView.php');
}
