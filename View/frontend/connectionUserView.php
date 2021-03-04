<?php $title = "Tokyo guide" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>
<div id="bloc-page">
    <hr>
    <section class="connection">
        <form action="index.php?action=user_connected" method="post">
            <h2>Connexion à votre espace</h2>
            <p><img src="public/img/user.png" alt="user"></p>
            <p>
                <label for="username"> <input type="text" name="username" placeholder="Username" required></label>
                <label for="userpass"> <input type="password" name="userpass" placeholder="Password" required></label>
                <button class="button-connection send" type="submit">Connexion </button>
                <span>Pas encore inscrit ? <a class="" href="index.php?action=subscription">S'inscrire</a></span>
            </p>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>