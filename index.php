<?php
session_start();
require('Controller/Controller_Location.php');
require('Controller/Controller_Image.php');
require('Controller/Controller_Comment.php');
require('Controller/Controller.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listLocations') {
        readAll();
    } elseif ($_GET['action'] == 'location') {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1; /*Attention si currentPage contient nimporte quoi*/
        }
        read($_GET['page'], $_GET['id']);
    } elseif ($_GET['action'] == 'json_data') {
        location();
    } elseif ($_GET['action'] == 'addLocation') {
        if (isset($_POST['name']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url']) && isset($_POST['images'])) {
            if (!empty($_POST['name']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['url']) && !empty($_POST['images'])) {
                addLocation($_POST['name'], $_POST['latitude'], $_POST['longitude'], $_POST['title'], $_POST['content'], $_POST['url'], $_POST['images']);
                var_dump($_POST['images']);
            } else {
                print 'Veuillez remplir au moins un champs !';
            }
        } else {
            print 'Au moins un des champs est inexistant';
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_SESSION['username'], strip_tags($_POST['comment']));
        } else {
            print 'Champs vides ou inexistant';
        }
    } elseif ($_GET['action'] == 'updateLocation') {
        updatePage($_GET['id']);
    } elseif ($_GET['action'] == 'locationUpdated') {
        if (isset($_POST['id']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url'])) {
            if (!empty($_POST['name']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['id']) && !empty($_POST['url'])) {
                update($_POST['id'], $_POST['name'], $_POST['latitude'], $_POST['longitude'], $_POST['title'], strip_tags($_POST['content']), $_POST['url'], $_POST['images']);
            } else {
                print 'Veuillez remplir tout les champs !';
            }
        }
    } elseif ($_GET['action'] == 'admin') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            adminPage();
        } else {
            header('Location:index.php?action=home.php');
        }
    } elseif ($_GET['action'] == 'connection') {
        userConnexion();
    } elseif ($_GET['action'] == 'connectionAdmin') {
        adminConnexion();
    } elseif ($_GET['action'] == 'user_connected') {
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
                connectUser($_POST['username'], $_POST['userpass']);
            } else {
                print 'Au moins un des champs est vide !';
            }
        } else {
            print 'Les champs username et userpass n\'existent pas';
        }
    } elseif ($_GET['action'] == 'admin_connected') {
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
                connectAdmin($_POST['username'], $_POST['userpass']);
            } else {
                print 'Au moins un des champs est vide !';
            }
        } else {
            print 'Les champs username et userpass n\'existent pas';
        }
    } elseif ($_GET['action'] == 'admin') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            adminPage();
        } else {
            header('Location:index.php?action=listLocations');
        }
    } elseif ($_GET['action'] == 'adminLocation') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            image($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'adminpost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            location($_GET['id']);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($_GET['action'] == 'subscription') {
        subscribeView();
    } elseif ($_GET['action'] == 'subscribed') {
        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                subscribe($_POST['pseudo'], $_POST['pass'], $_POST['email']);
            } else {
                print 'L\'email n\'est pas au bon format !';
            }
        } else {
            print 'Veuillez remplir tout les champs !';
        }
    } elseif ($_GET['action'] == 'deletePost') {
        deletePost($_GET['id']);
    } elseif ($_GET['action'] == 'deleteComment') {
        deleteComment($_GET['id']);
    } elseif ($_GET['action'] == 'deleteUrl') {
        deleteUrl($_GET['id']);
    } elseif ($_GET['action'] == 'disconnected') {
        logOut();
    }
} else {
    readAll();
}
