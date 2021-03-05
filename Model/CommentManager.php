<?php

namespace TokyoAPI\Model;

require_once('model/Manager.php');
require_once('Entity/Comment.php');

class CommentManager
{

    public function postComment($comment)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('INSERT INTO comment(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
        $comments = $req->execute(array(
            'post_id' => $_GET['id'],
            'author' => $comment->getAuthor(),
            'comment' => $comment->getComments()
        ));
        return $comments;
    }

    public function getComments($id, $currentPage)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();

        $nbrElementPerPage = 5;

        $start = ($currentPage - 1) * $nbrElementPerPage;

        $req = $db->prepare('SELECT
    id, post_id, author, comment, 
    DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')
    AS comment_date_fr 
    FROM comment 
    WHERE post_id = ?
    ORDER BY 
    comment_date 
    DESC
    LIMIT ' . $start . ', ' . $nbrElementPerPage . '');

        $req->setFetchMode(\PDO::FETCH_CLASS, Comment::class);

        $req->execute(array($id));

        $pagination = $req->fetchAll();

        return $pagination;
    }


    public function getCommentPagination($locationId)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        /*Je définis le nb d'éléments par page*/
        $nbrElementPerPage = 5;
        /*Je récupère le nb total d'éléments*/
        $req = $db->prepare('SELECT count(*) AS c FROM comment WHERE post_id = ?');
        $req->execute(array($locationId));
        $totalElements = $req->fetch()['c'];
        $nbrPerPage = ceil($totalElements / $nbrElementPerPage);
        return $nbrPerPage;
    }

    //Modérer le commentaire

    public function deleteComment($id)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = :id');
        $delete = $req->execute(array(
            'id' => $id
        ));
        return $delete;
    }
}
