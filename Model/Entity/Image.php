<?php

namespace TokyoAPI\Model;

class Image {
 
    //Attributs  
    private $_place_id; 
    private $_url_img = []; 
    //creation date

    //Getters

    public function getPlaceId() {
        return $this->_place_id;
    }

    public function getUrl() {
        return $this->_url_img;
    }

    //Setters

    public function setPlaceId($place_id) {
        $this->_place_id = $place_id;
   }

    public function setUrl($url_img) {
        $this->_url_img = $url_img;
    }


    
}



