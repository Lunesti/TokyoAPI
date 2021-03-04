<?php

namespace TokyoAPI\Model;
// La classe sera dans ce namespace

require_once('model/Manager.php');
require_once('Entity/Comment.php');

class CommentManager
{

    //Ajouter un commentaire
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


    /* Pagination*/
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

    /* Pagination*/
    /*public function getCommentPagination($currentPage)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $nbrElementPerPage = 5;
        $start = ($currentPage - 1) * $nbrElementPerPage;
        $req = $db->query('SELECT
        id, author, comment, 
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')
        AS comment_date_fr 
        FROM comment 
        ORDER BY 
        comment_date 
        DESC
        LIMIT ' . $start . ', ' . $nbrElementPerPage . '');
        $req->setFetchMode(\PDO::FETCH_CLASS, Comment::class);
        $req->execute(array($currentPage));
        $pagination = $req->fetchAll();
        return $pagination;
    }*/

    /*Récupérer le nb de page à laide du nb total de commentaires*/


    //Afficher les commentaires associés à un post
    public function getComment($postId)
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
        $req->setFetchMode(\PDO::FETCH_CLASS, Comment::class);
        $req->execute(array($postId));
        $comment = $req->fetchAll();
        return $comment;
    }



    //Récupérer l'id des commentaires
    /*public function getIdComments()
    {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $req = $db->query('SELECT count(id) as cpt, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment ORDER BY comment_date DESC');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $count = $req->fetchAll();
        return $nbrOfPage;
    }*/

    /* public function getCommentPagination( $currentPage )
 {
        $connexion = new Manager();
        $db = $connexion->dbConnect();
        $comPerPage = 5;

        $req = $db->query( 'SELECT  count(*) FROM comment' );

        //récupérer le résultat le mettre dans une variable totale

        $start =  ( $currentPage - 1 ) * $comPerPage;
        
        $totalComments = $req->rowCount();
        $pagination = 
        return $totalComments;*/

    //créer une entité pagination
    // nb d'éléments par page
    // nb max d'éléments
    //currentPage

    //new pagination avec les 3 param que je passe dans le controller
    //}

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
