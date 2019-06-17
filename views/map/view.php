<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

// echo "<pre>";
//             print_r($points);
//             echo "</pre>";
//             die;
?>
 <head>

 <style>
      #map {
        height: 600px;
        width: 100%;
       }
    </style>
     <div id="map"></div>
    <script>

function initMap() {
  var infowindow = new google.maps.InfoWindow();
  var data = <?php  echo JSON::encode($point)?>;
  var uluru = {lat:  data.lat, lng: data.lng};
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 20, center: uluru});
      var uluru = new google.maps.LatLng(data.lat, data.lng);
      var marker = new google.maps.Marker({
        position: uluru,
         map: map,});   
}
    </script>
    </head>
    <body>
    <div class="header">
        <div class="container">
             <div class="col-md-12 col-lg-12">
                <div class="col-md-5 col-lg-5">
                     <img src="<?= $point->getImage_point() ?>" alt="" class="img-circle img-thumbnail img-fluid image"></div>
                          <div class="col-md-7 col-lg-7">
                                    <h2 class="product-name"><?= $point->name?></h2>
                                     <p><?= $point->type?></p>
                                     <p><?= $point->adres?></p>
                                         <img width="50px" src="<?=$point->user_fv->getImage();?>">
                                      <a  style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$point->user_fv->id]);?>"><?=$point->user_fv->username ?></a>
                             </div>
                 </div>
             
     <div class="content__">
     <h2>Фото від цієї локації</h2>
     <a class="btn btn-danger" href="<?= Url::toRoute(['map/add', 'id_user' => Yii::$app->user->id, 'id_point' => $point->id]); ?>">Додати Фото</a>

     </div>
     <?php foreach ($contents as $content): ?>
                        <?php if ($content->type == "фото"): ?>
                        <div class="col-md-3">
                        <div class="single-product">
                                <div class="product-f-image">
                        <div class="single-shop-comment">
                    <img width="50px" src="<?=$content->getUser($content->user_id)->getImage();?>">
                        <a  style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$content->getUser($content->user_id)->id]);?>"><?=$content->getUser($content->user_id)->username ?></a>
                        </div>
                            <div class="picture">
                                    <img src="<?= $content->getImage_content() ?>">
                            </div>
                        </div>
                        </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>       
     </body>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg7YwdcN7qXXMjSiWMitTEKNi0TuwFnGc&callback=initMap">
    </script>