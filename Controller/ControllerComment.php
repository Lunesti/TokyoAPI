<?php
require_once('Model/CommentManager.php');
require_once('Model/LocationManager.php');

class Comment
{
    private $commentManager;
    
    /**
     * Constructeur de la class Commentaire
     *
     * @return void
     */
    public function __construct()
    {
        $this->commentManager = new TokyoAPI\Model\CommentManager();
    }
    
    /**
     * Ajout de commentaires
     *
     * @param  mixed $postId
     * @param  mixed $author
     * @param  mixed $comment
     * @return void
     */
    public function addComment($postId, $author, $comment)
    {
        $comments = new TokyoAPI\Model\Comment($postId, $author, $comment);
        $comments->setAuthor($author);
        $comments->setComment($comment);
        $affectedLines = $this->commentManager->postComment($comments);
        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=location&id=' . $postId);
        }
    }
    
    /**
     * Supprimer un commentaire
     *
     * @param  mixed $commentId
     * @return void
     */
    public function deleteComment($commentId)
    {
        $this->commentManager->deleteComment($commentId);
        require('View/frontend/homeView.php');
    }
}
