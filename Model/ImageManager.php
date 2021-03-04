<?php

namespace TokyoAPI\Model; // La classe sera dans ce namespace

require_once('model/Manager.php');
require_once('Entity/Image.php');


class ImageManager {

    //Ajouter une image
    public function postImage($image) //$image est un nouvel objet qui va contenir l'url et l'id
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('INSERT INTO table (place_id, url_img) VALUES(:place_id, :url_img)');
        $url = array();
        $row = $url["url_img"];
        $req->execute(array(
            $row =>$image->getUrl(),
            "place_id"=>$image->getPlaceId()
        ));
        return $req;
    }

     //Afficher les images
    public function getImages()
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->query('SELECT id, url_img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM image_place');
        $req->setFetchMode(\PDO::FETCH_CLASS, Image::class);
        $images = $req->fetchAll();
        return $images;
    }

    //Afficher les images associés à une location
    public function getImage($imageId)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('SELECT place_id, url_img FROM image_place WHERE place_id = ?');
        $req->setFetchMode(\PDO::FETCH_CLASS, Image::class);
        $req->execute(array($imageId));
        $image = $req->fetchAll();
        return $image;
    }

    //Modérer le commentaire 
    public function deleteImage($id) 
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare("DELETE FROM image_place WHERE id = :id");
        $delete = $req->execute(array(
            "id" => $id
        ));
        return $delete;
    }

 
}