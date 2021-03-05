<!--Ajouter une location-->
<!DOCTYPE html>

<?php $title = "Tokyo Guide" ?>

<?php ob_start(); ?>


<?php include('template/header.php'); ?>


<div id="bloc-page">

    <div class="admin">
  
        <hr>
        <h3>Page d'administration</h3>

        <!--Ajouter une location-->
        <form action="index.php?action=addLocation" method="post">
            <h4>Ajout d'une nouvelle Location :</h4>
            <p class='location'>
                <label for="url">Image de couverture : <input type="url" name="url" required></label>
                <label for="name">Location : <input type="text" name="name"></label>
                <label for="latitude">Latitude : <input type="number" name="latitude" step="any" placeholder="ex: 00.000000"></label>
                <label for="longitude">Longitude : <input type="number" name="longitude" step="any" placeholder="ex: 000.000000"></label>
            </p>
            <p class='post'>
                <label class="title-post"> Saisir le post à ajouter :</label>
                <label for="Title">Titre : <input type="text" name="title" required></label>
                <label for="content">Contenu : <textarea name="content" cols="30" rows="10"></textarea></label>
                <label class="url_label" for="url">
                    <p>Inserer vos URLs : </p>
                    <ul id="myList">
                        <li><input type="url" name="images[]">
                            <span class="buttonAdd">+</span>
                        </li>
                    </ul>
                </label>
            </p>
            <button class="send" type="submit">Envoyer</button>
        </form>

        <hr>
        <h4>Contenu à modifier / supprimer :</h4>
        <?php
        foreach ($listLocations as $data) : ?>
            <p>- <?= $data->title; ?> => <a href="index.php?action=location&amp;id=<?= $data->id ?>">Afficher</a> / <a href="index.php?action=updateLocation&amp;id=<?= $data->id ?>">Modifier</a> / <a href="index.php?action=deletePost&amp;id=<?= $data->id ?>">Supprimer</a></p>
        <?php
        endforeach;
        ?>
    </div>
    <?php include('template/Footer.php'); ?>
</div>

<?php $content = ob_get_clean(); ?>


<?php include('template/html.php'); ?>


<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    });

    //Faire générer des inputs lors d'un clique sur button
    function myFunction() {

        let buttonAddInput = document.querySelector('.buttonAdd');

        buttonAddInput.addEventListener('click', function() {

            var li = document.createElement("li");
            var newInput = document.createElement("input");
            newInput.setAttribute("name", "images[]");
            newInput.style.marginBottom = '5px';
            newInput.style.marginRight = '3px';
            newInput.setAttribute('type', 'url');
            li.appendChild(newInput);

            document.getElementById("myList").appendChild(li);
            var buttonRemoveInput = document.createElement("span");
            buttonRemoveInput.style.borderRadius = '50%';
            buttonRemoveInput.style.width = '30px';
            buttonRemoveInput.style.height = '30px';
            buttonRemoveInput.textContent = " - ";
            li.appendChild(buttonRemoveInput);

            buttonRemoveInput.addEventListener('click', function() {
                li.removeChild(newInput);
                li.removeChild(buttonRemoveInput);
            });
        });
    }
    myFunction();
</script>



