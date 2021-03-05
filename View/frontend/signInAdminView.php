<?php $title = "Blog de Jean Forteroche" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>

<div id="bloc-page">
    <hr>
    <section class="connection">
        <form action="index.php?action=admin_connected" method="post">
            <h2>Espace administrateur</h2>
            <p><img src="public/img/user.png" alt="user"></p>
            <p>
                <label for="username"> <input type="text" name="username" placeholder="Username"></label>
                <label for="userpass"> <input type="password" name="userpass" placeholder="Password"></label>
                <button class="button-connection send" type="submit">Connexion </button>
            </p>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>