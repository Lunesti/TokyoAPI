<?php

namespace TokyoAPI\Model; /*La classe sera dans ce namespace*/

require_once('model/Manager.php');
require_once('Entity/Location.php');

class LocationManager
{
    //Afficher les posts    
    public function getLocations(): array
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->query('SELECT id, location_name, latitude, longitude, title, content, cover_img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM place ORDER BY creation_date DESC');
        $req->setFetchMode(\PDO::FETCH_CLASS, Location::class);
        $locations = $req->fetchAll();
        return $locations;
    }


    /* Jointures place / image_place*/

    public function getLocation($placeId)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare(
            'SELECT place.*, url_img AS image_url_img FROM place INNER JOIN image_place ON image_place.place_id = place.id WHERE place.id = ?'
        );
        $req->execute(array(
            $placeId
        ));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $location = $req->fetchAll();
        $locations = LocationManager::mergeLocationsUrls($location);
        return $locations;
    }

    public static function mergeLocationsUrls(array $locationWithUrls): array
    {
        $urls = [];

        foreach ($locationWithUrls as $location) {
            array_push($urls, $location['image_url_img']);
        }
        return $locationWithUrls;
    }

    /* Ajouter un nouvel article*/
    public function postLocation($newLocation): object
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('INSERT INTO place(location_name, latitude, longitude, title, content, cover_img, creation_date) 
        VALUES( :location_name, :latitude, :longitude, :title, :content, :cover_img, NOW())');

        $req->execute(array(
            'location_name' => $newLocation->__toString(),
            'latitude' => $newLocation->getLatitude(),
            'longitude' => $newLocation->getLongitude(),
            'title' => $newLocation->getTitle(),
            'content' => $newLocation->getContent(),
            'cover_img' => $newLocation->getCoverImg()
        ));


        /* Récupérer la valeur ID pour les lignes insérées sur l'objet $pdo*/
        $id_nouveau = $db->lastInsertId();
        $newLocation->setId($id_nouveau);

        $sql = 'INSERT INTO image_place (place_id, url_img) VALUES ';

        $insertQuery = array();/* Insérer requête [] */
        $insertData = array(); /* Insérer données [] */
        $n = 0;
        foreach ($newLocation->getImages() as $image) {
            var_dump($image);
            $insertQuery[] = '(:place_id' . $n . ', :url_img' . $n . ')';
            $insertData['place_id' . $n] = $newLocation->getId();
            $insertData['url_img' . $n] = $image; /*ce que je récupère en html*/
            $n++;
        }

        if (!empty($insertQuery)) {
            $sql .= implode(', ', $insertQuery); /* On insère la requête dans la méthode implode()*/
            $stmt = $db->prepare($sql);
            $stmt->execute($insertData);
        }
        return $req;
    }


   /* Modifier un article*/ 
    public function updatePost($location): object
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $update = $db->prepare('UPDATE place
         SET location_name = :location_name, latitude = :latitude, longitude = :longitude, title = :title, content = :content, cover_img = :cover_img WHERE id = :id');
        $update->execute(array(
            'id' => $location->getId(),
            'location_name' => $location->__toString(),
            'latitude' => $location->getLatitude(),
            'longitude' => $location->getLongitude(),
            'title' => $location->getTitle(),
            'content' => $location->getContent(),
            'cover_img' => $location->getCoverImg()
        ));

        return $update;
    }

   /* Supprimer une location*/
    public function deleteLocation($id)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('DELETE FROM place WHERE id = :id');
        $req->setFetchMode(\PDO::FETCH_CLASS, Location::class);
        $delete = $req->execute(array(
            'id' => $id
        ));
        return $delete;
    }

    /*Supprimer une/des image(s)*/
    public function deleteImage($urlImg, $placeId)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('DELETE FROM image_place WHERE image_place.place_id = :place_id AND image_place.url_img = :url_img');
        $req->setFetchMode(\PDO::FETCH_CLASS, Location::class);
        $delete = $req->execute(array(
            'place_id' => $placeId,
            'url_img' => $urlImg
        ));
        return $delete;
    }
}
