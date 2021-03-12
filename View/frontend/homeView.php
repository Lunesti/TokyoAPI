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
        voyage à Tokyo (maj: au vu de la situation actuelle il va falloir patienter encore une moment... ! ),
        je propose via une API de la map de Tokyo les connection_statusles plus intéressant
        (selon moi) à visiter, du à mon voyage que j'ai effectué en septembre 2018. J'ai conçu quelque chose de simple,
        mais le site sera amené à être embelli à l'avenir. En attendant, bonne navigation !
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