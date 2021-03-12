<?php
require_once('Model/UserManager.php');
require_once('Model/LocationManager.php');
require_once('Model/Entity/User.php');
require_once('Model/Entity/Location.php');


class User
{
    private $locationManager;
    private $userManager;
    
    /**
     * Constructeur de la class Utilisateur
     *
     * @return void
     */
    public function __construct()
    {
        $this->locationManager = new TokyoAPI\Model\LocationManager();
        $this->userManager = new TokyoAPI\Model\UserManager();
    }
    
    /**
     * Contrôle des champs utilisateurs
     *
     * @param  mixed $pseudo
     * @param  mixed $pass
     * @param  mixed $email
     * @return void
     */
    public function signUp($pseudo, $pass, $email)
    {
        $user = new TokyoAPI\Model\User();
        $user->setPseudo($pseudo);
        $user->setPass($pass);
        $user->setEmail($email);
        $newUser = $this->userManager->postUser($user);
        require('View/frontend/homeView.php');
    }
    
    /**
     * Accès à la page d'inscription
     *
     * @return void
     */
    public function signUpView()
    {
        require('View/frontend/signUpView.php');
    }
    
    /**
     * Gère la connexion utilisateur
     *
     * @param  mixed $pseudo
     * @param  mixed $pass
     * @return void
     */
    public function signInUser($pseudo, $pass)
    {
        $loginInformation = new TokyoAPI\Model\User();
        $loginInformation->setPseudo($pseudo);
        $loginInformation->setPass($pass);
        $login = $this->userManager->getUser($loginInformation);

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
    
    /**
     * Gère la connexion admin
     *
     * @param  mixed $pseudo
     * @param  mixed $pass
     * @return void
     */
    public function signInAdmin($pseudo, $pass)
    {
        $loginInformation = new TokyoAPI\Model\User();
        $loginInformation->setPseudo($pseudo);
        $loginInformation->setPass($pass);

        $login = $this->userManager->getUser($loginInformation);

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
    
    /**
     * Déconnexion
     *
     * @return void
     */
    public function logOut()
    {
        $_SESSION = array();
        session_destroy();
        require('View/frontend/homeView.php');
    }
    
    /**
     * Afficher la page de connexion utilisateur
     *
     * @return void
     */
    public function signInUserPage()
    {
        require('View/frontend/signInUserView.php');
    }
    
    /**
     * Afficher la page de connexion admin
     *
     * @return void
     */
    public function signInAdminPage()
    {
        require('View/frontend/signInAdminView.php');
    }
    
    /**
     * Afficher la page admin
     *
     * @return void
     */
    public function adminPage()
    {
        $listLocations =$this->locationManager->getLocations();
        require('View/frontend/adminView.php');
    }
}
