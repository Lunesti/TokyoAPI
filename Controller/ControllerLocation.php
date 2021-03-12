<?php

require_once('Model/LocationManager.php');
require_once('Model/CommentManager.php');


/**
 * Controle les enregistrements de la table Place
 *
 */
class Location
{
    private $locationManager;
    private $commentManager;
    
    /**
     * Constructeur de la class Location
     *
     * @return void
     */
    public function __construct()
    {
        $this->locationManager = new TokyoAPI\Model\LocationManager();
        $this->commentManager = new TokyoAPI\Model\CommentManager();
    }
    
    /**
     * Création d'une API sur les locations à Tokyo
     *
     * @return void
     */
    public function readAll()
    {
        $readAll = $this->locationManager->getLocations();
        header("Content-type:application/json");
        require('View/frontend/jsonView.php');
    }
    
    /**
     * Récupération des informations de locations 
     *
     * @return void
     */
    public function listLocations()
    {
        $listLocations = $this->locationManager->getLocations();
        require('View/frontend/homeView.php');
    }
        
    /**
     * Récupération d'une location, ses commentaires et la pagination
     *
     * @param  mixed $currentPage
     * @param  mixed $postId
     * @return void
     */
    public function location($currentPage, $postId)
    {
        $location = $this->locationManager->getLocation($postId);
        $commentManager = new TokyoAPI\Model\CommentManager();
        $comments = $this->commentManager->getComments($postId, $currentPage);
        $nbrOfPages = $this->commentManager->getCommentPagination($postId);
        require('View/frontend/postView.php');
    }
    
    /**
     * Ajouter une nouvelle Location
     *
     * @param  mixed $location_name
     * @param  mixed $latitude
     * @param  mixed $longitude
     * @param  mixed $title
     * @param  mixed $content
     * @param  mixed $coverImg
     * @param  mixed $images
     * @return void
     */

    public function addLocation($location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
    {
        $newLocation = new TokyoAPI\Model\Location();
        $newLocation->setLocation($location_name);
        $newLocation->setLatitude($latitude);
        $newLocation->setLongitude($longitude);
        $newLocation->setTitle($title);
        $newLocation->setContent($content);
        $newLocation->setCoverImg($coverImg);
        $newLocation->setImages($images);
        $location = $this->locationManager->postLocation($newLocation);
        var_dump($location);
        require('View/frontend/homeView.php');
    }
    
    /**
     * Modifier une Location existante
     *
     * @param  mixed $id
     * @param  mixed $location_name
     * @param  mixed $latitude
     * @param  mixed $longitude
     * @param  mixed $title
     * @param  mixed $content
     * @param  mixed $coverImg
     * @param  mixed $images
     * @return void
     */
    public function update($id, $location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
    {
        
        $update = new TokyoAPI\Model\Location();
        $update->setId($id);
        $update->setLocation($location_name);
        $update->setLatitude($latitude);
        $update->setLongitude($longitude);
        $update->setTitle($title);
        $update->setContent($content);
        $update->setCoverImg($coverImg);
        $update->setImages($images);
        $locationEdit = $this->locationManager->updateLocation($update);
        var_dump($locationEdit);
        header('Location: index.php?action=location&id=' . $id);
    }
    
    /**
     * Accéder à la page de modification
     *
     * @param  mixed $id
     * @return void
     */
    public function updatePage($id)
    {
        $location = $this->locationManager->getLocation($id);
        require("View/frontend/updateView.php");
    }
    
    /**
     * Supprimer un Post
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteLocation($id)
    {
        $this->locationManager->deleteLocation($id);
        header('Location: index.php?action=listLocations');
    }
}
