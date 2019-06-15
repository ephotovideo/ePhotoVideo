<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
 <head>
 <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 600px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat:  48.7732387, lng: 29.1556899};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg7YwdcN7qXXMjSiWMitTEKNi0TuwFnGc&callback=initMap">
    </script>
  </head>
  <body>
    
    <a class="add_to_cart_button"
     href="<?= Url::toRoute(['map/set-marker', 'id' => Yii::$app->user->id]); ?>">Налаштування сторінки</a>
     <?php $form = ActiveForm::begin(); ?>
     <?php ActiveForm::end(); ?>
</body>

