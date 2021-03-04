
<?php $title = "Blog de Jean Forteroche"?>
<?php ob_start(); ?>
<?php include('template/header.php');?>        
    <div id="bloc-page">
        <section class="inscription">
            <h2>Inscription</h2>
            <form action="index.php?action=subscribed" method="post">
                <p class='form'>
                    <label for="pseudo">Entrer un pseudo : <input type="text" name="pseudo"></label>
                    <label for="password">Entrer un password : <input type="password" name="pass"></label>
                    <label for="email">Entrer un email : <input type="text" name="email"></label>
                    <button class="send" type="submit">Envoyer </button>
                </p>
                
            </form>
        </section>
    </div>
    <?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>   
<?php include('template/footer.php'); ?>   