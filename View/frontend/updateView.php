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

    <h3>Modifiez un ou des champs ci dessous : </h3>

    <!-- Formulaire de modification de location-->
    <form action="index.php?action=locationUpdated" method="post">
        <p class='location'>
            <label for="url">Modifier l'image de couverture : <br><input type="url" name="url" value="<?= $location['0']['cover_img']; ?>"></label>
            <input type="hidden" name="id" value="<?= $location['0']['id']; ?>">
            <label for="name">Nom : <br> <input type="text" id="text" name="name" value="<?= $location['0']['location_name']; ?>"></label>
            <label for="latitude">Latitude : <br> <input type="number" name="latitude" value="<?= $location['0']['latitude']; ?>" step="any"></label>
            <label for="longitude">Longitude : <br> <input type="number" name="longitude" value="<?= $location['0']['longitude']; ?>" step="any"></label>
        </p>
        <p class='post'>
            <label class="title-post"> Saisir le post à ajouter :</label>
            <label for="Title">Titre : <input type="text" name="title" value="<?= $location['0']['title']; ?>" required></label>
            <label for="content">Saisissez l'article modifié :</label><textarea name="content" id="textarea" cols="30" rows="10"><?= htmlspecialchars($location['0']['content']); ?></textarea>
            <span>Gérer vos url :</span>
            <?php foreach ($location as $key => $value) {
                if (is_array($value)) { ?>
                    <label class='images' for="url"><input type="url" class='url' name="images" value="<?= $value['image_url_img']; ?>"></label>
            <?php  }
            } ?>
        <ul id="myList">
            <li><input type="url" name="images[]">
                <span class="buttonAdd">+</span>
            </li>
        </ul>
        <button class="send" type="submit">Envoyer</button>
        </p>
    </form>

    <?php include('template/footer.php'); ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include('template/html.php'); ?>

<!-- Script TinyMCE-->
<script src="https://cdn.tiny.cloud/1/cmdzeda6yrj1wga8di8rs07wq89ifems1i96r1egmjefib9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    });
    </script>
    <script>

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