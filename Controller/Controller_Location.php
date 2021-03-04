<?php

require_once('Model/LocationManager.php');
require_once('Model/CommentManager.php');
require_once('Model/ImageManager.php');

function location()
{
    $locationManager = new TokyoAPI\Model\LocationManager();
    $locations = $locationManager->getLocations();
    header("Content-type:application/json");
    require('View/frontend/locationView.php');
}

function readAll()
{
    //Afficher les posts
    $locationManager = new TokyoAPI\Model\LocationManager();
    $listLocations = $locationManager->getLocations();
    require('View/frontend/homeView.php');
}
  
function read($currentPage, $id)
{
    $locationId = new TokyoAPI\Model\Location();
    $locationId->setId($id);
    $locationManager = new TokyoAPI\Model\LocationManager();
    $location = $locationManager->getLocation($id);
    $commentManager = new TokyoAPI\Model\CommentManager();
    /*On envoie à la vue les commentaires*/
    $comments = $commentManager->getComments($id, $currentPage);
    $nbrOfPages = $commentManager->getCommentPagination($id);
    require('View/frontend/PostView.php');
}

function addLocation($location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
{
    var_dump($_POST);
    //Création d'un nouvel objet Location
    $newLocation = new TokyoAPI\Model\Location();
    //On crée une nouvelle instance de Location, et on appel les setters en leur passant les variables titre et contenu
    $newLocation->setLocation($location_name);
    $newLocation->setLatitude($latitude);
    $newLocation->setLongitude($longitude);
    $newLocation->setTitle($title);
    $newLocation->setContent($content);
    $newLocation->setCoverImg($coverImg);
    $newLocation->setImages($images);
    $locationManager = new TokyoAPI\Model\LocationManager();
    $location = $locationManager->postLocation($newLocation);
    var_dump($location);
}

function update($id, $location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
{
    /*Création d'un nouvel objet Location*/
    $update = new TokyoAPI\Model\Location();
    /*On crée une nouvelle instance de Location, et on appel les setters en leur passant les variables titre, contenu et id*/
    $update->setId($id);
    $update->setLocation($location_name);
    $update->setLatitude($latitude);
    $update->setLongitude($longitude);
    $update->setTitle($title);
    $update->setContent($content);
    $update->setCoverImg($coverImg);
    $update->setImages($images);
    /*On crée une nouvelle instance de locationManager et on passe en paramètre l'objet $update dans la méthode getUpdate*/
    $locationManager = new TokyoAPI\Model\LocationManager();
    $locationEdit = $locationManager->updatePost($update);
    var_dump($locationEdit);
    header('Location: index.php?action=location&id=' .$id);
}


function updatePage($id) 
/* Je récupère l'id du post à modifier*/
{
    /*On instancie la class LocationManager
    on passe en paramètre l'id dans getLocation*/
    $locationManager = new TokyoAPI\Model\LocationManager();
    $location = $locationManager->getLocation($id);
    /*On redirige vers updateView*/
    require("View/frontend/updateView.php");
}

function deletePost($id) /*On récupère le post à supprimer*/
{
    $locationManager = new TokyoAPI\Model\LocationManager();
    /*On appel la méthode getDelete en lui passant l'id du location à supprimer*/
    $locationManager->deleteLocation($id);
    header('Location: index.php?action=listLocations');
}

//Supprimer l'image
function deleteImage($urlImg, $placeId) 
 {
    $locationManager = new TokyoAPI\Model\LocationManager();
     //On appel la méthode deleteImage en lui passant l'id de l'image à supprimer
     $locationManager->deleteImage($urlImg, $placeId);
    header('Location:index.php?action=listLocations');
}
