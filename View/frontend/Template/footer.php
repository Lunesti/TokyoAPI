<footer>
    <p>Tous droits réservés © Arben PEPOSI 2020 - Formation Openclassrooms - Développeur Web Junior - Projet n°5 : Projet personnel</p>
        <!--Espace administrateur-->

    <!--Lien vers la page d'administration-->
    <?php if (isset($_SESSION['username'])) {
        if ($_SESSION['user_role'] == 'admin') { ?>
            <p><a href="index.php?action=admin">Page d'administration</a></p>
        <?php }
    } else { ?>
        <p class="admin"><a href="index.php?action=connectionAdmin">Espace administrateur</a></p>
    <?php }
    ?>
</footer>