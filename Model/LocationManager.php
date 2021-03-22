<?php

namespace TokyoAPI\Model; /*La classe sera dans ce namespace*/

require_once('model/Manager.php');
require_once('Entity/Location.php');

/**
 * Gérer les enregistrements de la table Location
 *
 * @author Arben Peposi <arben.peposi@outlook.fr>
 *
 * @param int    $example  This is an example function/method parameter description.
 * @param string $example2 This is a second example.
 */
class LocationManager extends Manager
{
    /**
     * Récupération de toute les locations
     *
     * @return array
     */


    public function getLocations(): array
    {
        try {
            $db = $this->dbConnect();
            $req = $db->query('SELECT id, location_name, latitude, longitude, title, content, cover_img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM `location` ORDER BY creation_date DESC');
            $req->setFetchMode(\PDO::FETCH_CLASS, Location::class);
            $locations = $req->fetchAll();
            return $locations;
        } catch (\PDOException $exception) {
            var_dump($db->errorInfo());
            die('Erreur : ' . $exception->getMessage());
        }
    }

    /**
     * Récupération d'une location et de son id
     *
     * @param  mixed $placeId
     * @return array
     */
    public function getLocation($placeId)
    {
        try {
            $db = $this->dbConnect();
            $req = $db->prepare(
                'SELECT `location`.*, location_url AS `image` FROM `location` INNER JOIN location_urls ON location_urls.location_id = `location`.id WHERE `location`.id = ?'
            );
            $req->execute(array(
                $placeId
            ));
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $location = $req->fetchAll();
            $locations = LocationManager::mergeLocationsUrls($location);
            return $location;
        } catch (\PDOException $exception) {
            var_dump($db->errorInfo());
            die('Erreur : ' . $exception->getMessage());
        }
    }


    /**
     * Fusionner les urls dans un tableau
     *
     * @param  mixed $locationWithUrls
     * @return array
     */
    public static function mergeLocationsUrls(array $locationWithUrls): array
    {
        try {
            $urls = [];

            foreach ($locationWithUrls as $location) {
                array_push($urls, $location['image']);
            }
            return $urls;
        } catch (\PDOException $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
    }

    /**
     * Ajouter une nouvelle location
     *
     * @param  mixed $newLocation
     * @return object
     */
    public function postLocation($newLocation): object
    {
        try {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO `location`(location_name, latitude, longitude, title, content, cover_img, creation_date) 
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

            $sql = 'INSERT INTO `location_urls` (location_id, location_url) VALUES ';

            $insertQuery = array();/* Insérer requête [] */
            $insertData = array(); /* Insérer données [] */
            $n = 0;
            foreach ($newLocation->getImages() as $image) {
                $insertQuery[] = '(:location_id' . $n . ', :location_url' . $n . ')';
                $insertData['location_id' . $n] = $newLocation->getId();
                $insertData['location_url' . $n] = $image; /*ce que je récupère en html*/
                $n++;
            }

            if (!empty($insertQuery)) {
                $sql .= implode(', ', $insertQuery); /* On insère la requête dans la méthode implode()*/
                $stmt = $db->prepare($sql);
                $stmt->execute($insertData);
            }
            return $req;
        } catch (\PDOException $exception) {
            var_dump($db->errorInfo());
            die('Erreur : ' . $exception->getMessage());
        }
    }

    /**
     * Modifier une location
     *
     * @param  mixed $location
     * @return object
     */
    public function updateLocation($location): object
    {
        try {
            $db = $this->dbConnect();
            $update = $db->prepare('UPDATE `location`
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
        } catch (\PDOException $exception) {
            var_dump($db->errorInfo());
            die('Erreur : ' . $exception->getMessage());
        }
    }



    /**
     * Supprimer une location
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteLocation($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM `location` WHERE id = :id');
        $req->setFetchMode(\PDO::FETCH_CLASS, Location::class);
        $delete = $req->execute(array(
            'id' => $id
        ));
        return $delete;
    }
}
