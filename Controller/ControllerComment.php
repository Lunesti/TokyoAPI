<?php
require_once('Model/CommentManager.php');

/* Ajouter commentaires*/
function addComment($postId, $author, $comment)
{
    $comments = new TokyoAPI\Model\Comment($postId, $author, $comment);
    $comments->setAuthor($author);
    $comments->setComment($comment);
    $commentManager = new TokyoAPI\Model\CommentManager();
    $affectedLines = $commentManager->postComment($comments);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=location&id=' . $postId);
    }
}




