<?php ob_start(); ?>
<?php include('template/header.php'); ?>

<div id="bloc-page">
    <!--Banniere-->
    <figure>
        <img src="#" id="slider-img" class="image" alt="banniere diaporama">
        <a class="prev"> &#10094; </a>
        <a class="next"> &#10095; </a>
    </figure>
    <!--Titre-->
    <h2>Bienvenue sur mon site !</h2>
    <!--Description-->
    <p>Je m'appel Arben, j'ai créé ce site pour les gens qui souhaitent entreprendre leur premier
        voyage à Tokyo !
        Dans la cartographie référencé ci-dessous vous retrouvez tout les lieux que j'ai visité, des photos que j'ai réalisé moi même alors n'hésitez pas à y jeter un oeil !
        pour toute question vous pouvez me contacter sur arben.peposi@outlook.fr. Bonne visite !
    </p>



    <!-- Bulle-->
    <section class='section'>

        <div id="map"></div>
        <div class="locationInfos">
            <!-- data->location_name-->
            <p><span id="locationName"></span></p>
            <!-- data->cover_img-->
            <p class='backgroundImg'><img class="img" src="#" alt="image location"></p>
            <!-- data->id-->
            <p id="locationPage">Lien vers l'article</p>
        </div>
        <!--Map-->

    </section>

    <?php include('template/footer.php'); ?>
</div>

<script src="Public/js/Slider.js"></script>

<?php $content = ob_get_clean(); ?>

<?php include('template/html.php'); ?>