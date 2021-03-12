<?php

namespace TokyoAPI\Model;

require_once('model/Manager.php');
require_once('Entity/Comment.php');

class CommentManager extends Manager
{

    /**
     * Ajouter un nouveau commentaire
     *
     * @param  mixed $comment
     * @return void
     */
    public function postComment($comment)
    {
        try {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO comment(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
            $comments = $req->execute(array(
                'post_id' => $_GET['id'],
                'author' => $comment->getAuthor(),
                'comment' => $comment->getComments()
            ));
        } catch (\PDOException $exception) {
            die('Erreur : ' . $exception->getMessage());
        }

        return $comments;
    }

    /**
     * Récupére les commentaires avec une limite par page
     *
     * @param  mixed $postId
     * @param  mixed $currentPage
     * @return void
     */
    public function getComments($postId, $currentPage)
    {
        try {
            $db = $this->dbConnect();
            $nbrElementPerPage = 5;
            $start = ($currentPage - 1) * $nbrElementPerPage;
            $req = $db->prepare('SELECT id, post_id, author, comment,  DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr  FROM comment  WHERE post_id = ? ORDER BY  comment_date  DESC
        LIMIT ' . $start . ', ' . $nbrElementPerPage . '');
            $req->setFetchMode(\PDO::FETCH_CLASS, Comment::class);
            $req->execute(array($postId));
            $pagination = $req->fetchAll();
        } catch (\PDOException $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
        return $pagination;
    }


    /**
     * Récupère le nombre de pages
     *
     * @param  mixed $postId
     * @return void
     */
    public function getCommentPagination($postId)
    {
        try {
            $db = $this->dbConnect();
            $nbrElementPerPage = 5;
            $req = $db->prepare('SELECT count(*) AS c FROM comment WHERE post_id = ?');
            $req->execute(array($postId));
            $totalElements = $req->fetch()['c'];
            $nbrOfPage = ceil($totalElements / $nbrElementPerPage);
        } catch (\PDOException $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
        return $nbrOfPage;
    }

    /**
     * Supprimer un commentaire
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = :id');
        $delete = $req->execute(array(
            'id' => $id
        ));

        return $delete;
    }
}
