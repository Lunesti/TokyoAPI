<!DOCTYPE html>

<?php $title = "Blog de Jean Forteroche" ?>
<?php ob_start(); ?>
<?php include('template/header.php'); ?>
<script src="https://cdn.tiny.cloud/1/cmdzeda6yrj1wga8di8rs07wq89ifems1i96r1egmjefib9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    });
</script>



<div id='bloc-page'>
<hr>
    <h2>Modifier vos informations de locations : </h2>

    <!-- Formulaire de modification de location-->
    <form action="index.php?action=locationUpdated" method="post">

        <div class="form-group">
            <label class="url" for="url">Image de couverture : </label><input type="url" class="form-control input-size" name="url" value="<?= $location['0']['cover_img']; ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $location['0']['id']; ?>">
        <div class="form-group">
            <label for="name">Location</label> : <input type="text" class="form-control input-size" name="name" value="<?= $location['0']['location_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude :</label> <input type="number" class="form-control input-size" name="latitude" step="any" placeholder="ex: 00.000000" minlength="8" value="<?= $location['0']['latitude']; ?>" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude :</label> <input type="number" class="form-control input-size" name="longitude" step="any" placeholder="ex: 000.000000" minlength="8" value="<?= $location['0']['longitude']; ?>" required>
        </div>
        <p class='post'>
        <div class="form-group">
            <label for="Title">Titre : </label><input type="text" class="form-control  input-size" name="title" value="<?= $location['0']['title']; ?>" required>
        </div>
        <label for="content">Saisissez l'article modifié :</label><textarea name="content" id="textarea" cols="30" rows="10"><?= htmlspecialchars($location['0']['content']); ?></textarea>
        <div class="form-group">
            <p>Modifier vos URLs : </p>
            <?php foreach ($location as $key => $value) {
                if (is_array($value)) { ?>
                    <label class='images' for="url"><input type="url" class='url form-control input-size' name="images" value="<?= $value['image']; ?>">
                <?php  }
            } ?>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        </p>
    </form>

    <?php include('template/footer.php'); ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>

<!-- Script TinyMCE-->
<script src="https://cdn.tiny.cloud/1/cmdzeda6yrj1wga8di8rs07wq89ifems1i96r1egmjefib9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="Public/js/tinyMCE.js"></script>