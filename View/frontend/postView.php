<?php ob_start(); ?>

<?php include('template/header.php'); ?>


<div id="bloc-page">

    <hr>

    <!----ARTICLE----------------------------->
    <article>

        <div class="content">
            <!--Titre de l'article-->
            <h3><?= htmlspecialchars_decode($location['0']['title']) ?></h3>
            <!--Images de l'article-->
            <?php foreach ($location as $key => $value) {
                if (is_array($value)) { ?>
                    <p>
                        <img src=" <?= $value['image_url_img']; ?>" alt="">
                    </p>
            <?php  }
            } ?>

            <!--Contenu de l'article-->
            <p><?= nl2br(htmlspecialchars_decode($location['0']['content'])) ?></p>


            <!--Date de l'article-->
            <p class="creation_date"> Article écrit le <?= htmlspecialchars($location['0']['creation_date']); ?></p>

            <?php
            //Si l'utilisateur est un admin, on accède aux paramètres admin
            if (isset($_SESSION['username'])) {
                if ($_SESSION['user_role'] == 'admin') {
            ?>
                    <a href="index.php?action=updateLocation&amp;id=<?= $location['0']['id'] ?>">Modifier</a>
                    <a href="index.php?action=deletePost&amp;id=<?= $location['0']['id'] ?>">Supprimer</a>
            <?php
                }
            }
            ?>

        </div>

        <!-- Espace commentaires-->
        <h3>Commentaires</h3>
        <form class='comments' action="index.php?action=addComment&amp;id=<?= $location['0']['id'] ?>" method="post">

            <!--On affiche le pseudo de l'utilisateur connecté-->
            <?php if (isset($_SESSION['username'])) {

            ?>
                <p>Utilisateur connecté : <strong><span class="user"><?php print $_SESSION['username']; ?></strong></span></p>
                <textarea id="comment" name="comment" rows="4" cols="100" placeholder="Veuillez saisir votre commentaire içi..."> </textarea>
                <button class="send" type="submit">Envoyer </button>

            <?php } else { ?><p><a class="com_if_connect" href="index.php?action=connection">Veuillez vous connecter pour
                        pouvoir laisser un commentaire </a></p>
            <?php
            } ?>
        </form>

        <!--Affichage des commentaires -->
        <?php foreach ($comments as $comment) :
        ?>
            <p><strong> <?= htmlspecialchars_decode($comment->author) ?>, </strong> <span class="date">le
                    <?= $comment->comment_date_fr; ?></span></p><a href="index.php?action=deleteComment&amp;id=<?= $comment->id ?>">Supprimer</a>
            <?= $comment->comment; ?></span></p>
        <?php endforeach; ?>
        <p id="pagination">
            <?php
            var_dump($nbrOfPages);
            for ($i = 1; $i <= $nbrOfPages; $i++) { ?>
                <!--nb de pages-->
                <a href="index.php?action=location&id=<?= $location['0']['id'] ?>&page=<?= $i ?>"><?= $i ?></a>&nbsp;
            <?php  }
            ?>
        </p>

    </article>
    </article>

    <?php include('template/footer.php'); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php include('template/html.php'); ?>