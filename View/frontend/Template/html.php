<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset='utf-8'>
      <meta name="viewport" content="width=device-width">
      <meta name='description' content='Tokyo guide openclassrooms'>
      <meta name='keywords' content='Blog Tokyo guide openclassrooms'>
      <meta name="author" content="Arben peposi">
      <title>API Tokyo</title>
      <!-- API Leaflet CSS -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
         integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
         crossorigin=""/>
         <link href="Public/css/style.css" rel="stylesheet" /> 
         <link href="Public/css/responsive.css" rel="stylesheet" /> 
         </head>

   <body>
      <!-- Insertion de la map --> 
      <?= $content ?>
   </body>

   <!-- API Leaflet JS -->
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""></script>

   <script src="https://cdn.tiny.cloud/1/cmdzeda6yrj1wga8di8rs07wq89ifems1i96r1egmjefib9u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script src="Public/js/map.js"></script>
</html>

