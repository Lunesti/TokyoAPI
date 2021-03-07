<?php
session_start();
require('Controller/ControllerLocation.php');
require('Controller/ControllerComment.php');
require('Controller/ControllerUser.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listLocations') {
        LocationControl::listLocations();
    } elseif ($_GET['action'] == 'location') {
        if (!isset($_GET['page'])) {
            //if get page == numeric
            //is numeric
            $_GET['page'] = 1;
        }
        LocationControl::location($_GET['page'], $_GET['id']);
    } elseif ($_GET['action'] == 'json_data') {
        LocationControl::json();
    } elseif ($_GET['action'] == 'addLocation') {
        if (isset($_POST['name']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url']) && isset($_POST['images'])) {
            if (!empty($_POST['name']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['url']) && !empty($_POST['images'])) {
                LocationControl::addLocation($_POST['name'], $_POST['latitude'], $_POST['longitude'], $_POST['title'], $_POST['content'], $_POST['url'], $_POST['images']);
            } else {
                print 'Veuillez remplir au moins un champs !';
            }
        } else {
            print 'Au moins un des champs est inexistant';
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            CommentControl::addComment($_GET['id'], $_SESSION['username'], strip_tags($_POST['comment']));
        } else {
            print 'Champs vides ou inexistant';
        }
    } elseif ($_GET['action'] == 'updateLocation') {
        LocationControl::updatePage($_GET['id']);
    } elseif ($_GET['action'] == 'locationUpdated') {
        if (isset($_POST['id']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url'])) {
            if (!empty($_POST['name']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['id']) && !empty($_POST['url'])) {
                LocationControl::update($_POST['id'], $_POST['name'], $_POST['latitude'], $_POST['longitude'], $_POST['title'], $_POST['content'], $_POST['url'], $_POST['images']);
            } else {
                print 'Veuillez remplir tout les champs !';
            }
        }
    } elseif ($_GET['action'] == 'admin') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            UserControl::adminPage();
        } else {
            header('Location:index.php?action=home.php');
        }
    } elseif ($_GET['action'] == 'connection') {
        UserControl::signInUserPage();
    } elseif ($_GET['action'] == 'connectionAdmin') {
        UserControl::signInAdminPage();
    } elseif ($_GET['action'] == 'user_connected') {
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
                UserControl::signInUser($_POST['username'], $_POST['userpass']);
            } else {
                print 'Au moins un des champs est vide !';
            }
        } else {
            print 'Les champs username et userpass n\'existent pas';
        }
    } elseif ($_GET['action'] == 'admin_connected') {
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
                UserControl::signInAdmin($_POST['username'], $_POST['userpass']);
            } else {
                print 'Au moins un des champs est vide !';
            }
        } else {
            print 'Les champs username et userpass n\'existent pas';
        }
    } elseif ($_GET['action'] == 'admin') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            UserControl::adminPage();
        } else {
            header('Location:index.php?action=listLocations');
        }
    } elseif ($_GET['action'] == 'adminpost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            LocationControl::location($_GET['page'], $_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'subscription') {
        UserControl::signUpView();
    } elseif ($_GET['action'] == 'subscribed') {
        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                UserControl::signUp($_POST['pseudo'], $_POST['pass'], $_POST['email']);
            } else {
                print 'L\'email n\'est pas au bon format !';
            }
        } else {
            print 'Veuillez remplir tout les champs !';
        }
    } elseif ($_GET['action'] == 'deletePost') {
        LocationControl::deletePost($_GET['id']);
    } elseif ($_GET['action'] == 'deleteComment') {
        LocationControl::deleteComment($_GET['id']);
    } elseif ($_GET['action'] == 'deleteUrl') {
        LocationControl::deleteUrl($_GET['id']);
    } elseif ($_GET['action'] == 'disconnected') {
        UserControl::logOut();
    }
} else {
    LocationControl::listLocations();
}
