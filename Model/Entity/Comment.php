<?php

namespace TokyoAPI\Model; // La classe sera dans ce namespace

class Comment {

    //Attributs  
    private $_id;
    private $_postId;
    private $_author;
    private $_comments;
    private $_comment_date;
    private $_report;

    /*Getters*/

    public function getId() {
        return $this->_id;
    }

     public function getPostId() {
        return $this->_postId;
    }

    public function getAuthor() {
      return $this->_author;
    }

     public function getComments() {
        return $this->_comments;
    }

    public function getCommentDate() {
        return $this->_comment_date;
    }

    public function getReport() {
        return $this->_report;
    }

    /*Setters*/

    public function setId($id) {
        $this->_id = $id;
    }

    public function setPostId($postId) {
        $this->_postId = $postId;
    }

    public function setAuthor($author) {
        $this->_author = $author;
    }

    public function setComment($comment) {
        $this->_comments = $comment;
    }

    public function setDate($date) {
        $this->_comment_date = $date;
    }

    public function setReport($report) {
        $this->_report = $report;
    }

}