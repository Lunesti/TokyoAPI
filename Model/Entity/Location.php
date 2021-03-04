<?php

namespace TokyoAPI\Model;

class Location {

    private $_id;
    private $_location_name;
    private $_latitude;
    private $_longitude;
    private $_title;
    private $_content;
    private $_coverImg;
    private $_creation_date;
    private $_images;


    /*Getters*/

    public function getId() {
        return $this->_id;
    }

    public function __toString() {
        return ( string ) $this->_location_name;
    }

    public function getLatitude() {
        return $this->_latitude;
    }

    public function getLongitude() {
        return $this->_longitude;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getContent() {
        return $this->_content;
    }

    public function getCoverImg() {
        return $this->_coverImg;
    }

    public function getImages() {
        return  $this->_images;
    }

    public function getDate() {
        return $this->_creation_date;
    }

    /*Setters*/

    public function setId( $id ) {
        $this->_id = $id;
    }

    public function setLocation( $location_name ) {
        if ( is_string( $location_name ) ) {
            $this->_location_name = $location_name;
        }
    }

    public function setLatitude( $latitude ) {
        if ( is_string( $latitude ) ) {
            $this->_latitude = $latitude;
        }
    }

    public function setLongitude( $longitude ) {
        if ( is_string( $longitude ) ) {
            $this->_longitude = $longitude;
        }
    }

    public function setTitle( $title ) {
        if ( is_string( $title ) ) {
            $this->_title = $title;
        }
    }

    public function setContent( $content ) {
        if ( is_string( $content ) ) {
            $this->_content = $content;
        }

    }

    public function setCoverImg( $coverImg ) {
        if ( is_string( $coverImg ) ) {
            $this->_coverImg = $coverImg;
        }
    }

    public function setImages( $images ) {
        $this->_images = $images;
    }

    public function setDate( $Date ) {
        if ( is_string( $Date ) ) {
            $this->_creation_date = $Date;
        }
    }
}