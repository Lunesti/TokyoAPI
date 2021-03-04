<?php

namespace TokyoAPI\Model;

class Post {
 
    //Attributs  
    private $_id; 
    private $_title;
    private $_content;
    private $_name_location;
    private $_creation_date;
  

    //Getters
    public function getId() {
        return $this->_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getContent() {
        return $this->_content;
    }

    public function getName() {
        return $this->_name_location;
    }

    public function getDate() {
        return $this->_creation_date;
    }

    //Setters
    public function setId($id) {
        $this->_id = $id;
    }

    public function setTitle($title) {
        if(is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }   
    }

    public function setName($name_location) {
        if (is_string($name_location)) {
            $this->_name_location = $name_location;
        }   
    }

    public function setDate($creation_date) {
        $this->_creation_date = $creation_date;
    }

}



