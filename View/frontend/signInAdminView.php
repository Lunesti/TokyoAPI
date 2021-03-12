<?php $title = "Tokyo guide" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>

<div id="bloc-page">
    <hr>
    <section class="connection">
    <h2>Espace administrateur</h2>
        <form action="index.php?action=admin_connected" method="post">
            
            <p><img src="Public/img/user.png" alt="user"></p>
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