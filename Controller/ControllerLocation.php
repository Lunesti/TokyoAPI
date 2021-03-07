<?php

require_once('Model/LocationManager.php');
require_once('Model/CommentManager.php');

class LocationControl
{

    static function json()
    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $locations = $locationManager->getLocations();
        header("Content-type:application/json");
        require('View/frontend/jsonView.php');
    }

    static function listLocations()
    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $listLocations = $locationManager->getLocations();
        require('View/frontend/homeView.php');
    }

    static function location($currentPage, $id)
    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $location = $locationManager->getLocation($id);
        $commentManager = new TokyoAPI\Model\CommentManager();
        $comments = $commentManager->getComments($id, $currentPage);
        $nbrOfPages = $commentManager->getCommentPagination($id);
        require('View/frontend/PostView.php');
    }

    static function addLocation($location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
    {

        $newLocation = new TokyoAPI\Model\Location();
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
        require('View/frontend/homeView.php');
    }

    static function update($id, $location_name, $latitude, $longitude, $title, $content, $coverImg, $images)
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
        $locationManager = new TokyoAPI\Model\LocationManager();
        $locationEdit = $locationManager->updateLocation($update);
        var_dump($locationEdit);
        header('Location: index.php?action=location&id=' . $id);
    }


    static function updatePage($id)

    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $location = $locationManager->getLocation($id);
        require("View/frontend/updateView.php");
    }

    static function deletePost($id)
    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $locationManager->deleteLocation($id);
        header('Location: index.php?action=listLocations');
    }

    function deleteImage($urlImg, $placeId)
    {
        $locationManager = new TokyoAPI\Model\LocationManager();
        $locationManager->deleteImage($urlImg, $placeId);
        header('Location:index.php?action=listLocations');
    }
}
