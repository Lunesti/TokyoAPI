
<?php $title = "Blog de Jean Forteroche"?>
<?php ob_start(); ?>
<?php include('template/header.php');?> 

<script>
 //Faire générer des input lors d'un clique sur button
 function myFunction() {
            let button = document.createElement("input");
            button.setAttribute('type','url');
            button.style.display = "block";
            button.style.marginBottom = "5px";
            document.querySelector('.myForm').appendChild(button);
        }</script>


<div id="bloc-page">
    <form class="myForm" action="index.php?action=image_added" method="post">
    <label for="url">Ajouter vos URLs : <input type="url" name="image[]" id="image" required><span onclick="myFunction()">+</span></label><br><br><br>
    <input type="submit">
    </form>
</div>


<?php include('template/Footer.php'); ?>  
<?php $content = ob_get_clean(); ?>

<?php include('template/html.php'); ?>   