<?php $title = "Tokyo guide" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>

<div id="bloc-page">
    <hr>
    <section class="inscription">
        <h2>Inscription</h2>
        <form action="index.php?action=subscribed" method="post">
            <p><img src="Public/img/user.png" alt="user"></p>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" aria-describedby="pseudoHelp" placeholder="Enter pseudo" required>

            </div>
            <div class="form-group">
                <label for="userpass">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary" onclick='Javascript:checkEmail();'>Submit</button>
            </div>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>

<script src='Public/js/Formulaire.js'></script>