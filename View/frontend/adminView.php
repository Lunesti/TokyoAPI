<!--Ajouter une location-->
<!DOCTYPE html>

<?php $title = "Tokyo Guide" ?>

<?php ob_start(); ?>


<?php include('template/header.php'); ?>


<div id="bloc-page">

    <div class="admin">

        <hr>
        <h2>Page d'administration</h2>
        <p class='location'>Veuillez ajouter votre nouvelle location ci-dessous :</p>
        <!--Ajouter une location-->
        <form class="form" action="index.php?action=addLocation" method="post">
            
            <div class="form-group">
                <label class="url" for="url">Image de couverture : </label><input type="url" class="form-control input-size" name="url" required>
            </div>
            <div class="form-group">
                <label for="name">Location</label> : <input type="text" class="form-control input-size" name="name" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude :</label> <input type="number" class="form-control input-size" name="latitude" step="any" placeholder="ex: 00.000000" minlength="8" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude :</label> <input type="number" class="form-control input-size" name="longitude" step="any" placeholder="ex: 000.000000" minlength="8" required>
            </div>
            <p class="location"> Veuillez saisir le post à ajouter:</p>
            <div class="form-group">
                <label for="Title">Titre : </label><input type="text" class="form-control  input-size" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu : </label><textarea name="content" class="form-control input-size" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label class="url_label" for="url">
                    <p>Inserer vos URLs : </p>
                </label>
                <ul id="myList">
                    <li><input type="url" class="form-control input-size" name="images[]">
                        <span class="buttonAdd">+</span>
                    </li>
                </ul>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
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
    <?php include('template/footer.php'); ?>
</div>

<?php $content = ob_get_clean(); ?>


<?php include('template/html.php'); ?>


<script src="Public/js/tinyMCE.js"></script>
<script src="Public/js/arrayImages.js"></script>
