<?php $title = "Tokyo guide" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>

<div id="bloc-page">
    <hr>
    <section class="connection">
        <h2>Connexion à votre espace</h2>
        <form action="index.php?action=user_connected" method="post">
            <p><img src="Public/img/user.png" alt="user"></p>
            <div class="form-group">
                <label for="username">Pseudo</label>
                <input type="text" name="username" class="form-control" aria-describedby="pseudoHelp" placeholder="Enter pseudo">

            </div>
            <div class="form-group">
                <label for="userpass">Password</label>
                <input type="password" name="userpass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <p>Pas encore inscrit ? <a class="" href="index.php?action=subscription">S'inscrire</a></p>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>