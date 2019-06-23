<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
?>
 <head>

 <style>
      #map {
        height: 600px;
        width: 100%;
       }
    </style>
  </head>
  <body>
  <div class = "container">
    <h3>My Google Maps Demo</h3>
    <a class="btn btn-danger"
     href="<?= Url::toRoute(['map/set-marker', 'id' => Yii::$app->user->id]); ?>">Додати Нову Мітку</a>
     <?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'name')->textInput()->label("Назва")?>
      <?= $form->field($model, 'type')->dropDownList([
        " " => " ",
        'Міська локація' => 'Міська локація',
        'Замки' => 'Замки',
        'Архітекутрні споруди' => 'Архітекутрні споруди',
        'Відкритий пейзаш' => 'Відкритий пейзаш',
        'Гори' => 'Гори',
        'Мости' => 'Мости',
        'Природа' => 'Природа',
        'Поля' => 'Поля',
        'Історичні конструкції' => 'Історичні конструкції',
        'Море\Пляж' => 'Море\Пляж',
        'Фото-студії' => 'Фото-студії',
        'Art-студії' => 'Art-студії',
        'Тунелі' => 'Тунелі',
        'Підземелля' => 'Підземелля'
    ])->label("Оберіть Категорію локації ");?>
    <?= $form->field($model, 'adres')->textInput()->label("Адреса")?>
    <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Шукати', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
     <?php ActiveForm::end(); ?>
     </div>
    <div id="map"></div>
    <script>

function initMap() {
  var infowindow = new google.maps.InfoWindow();
  var ar = <?php  echo JSON::encode($points)?>;
  console.log(ar);
  var uluru = {lat:  48.7732387, lng: 29.1556899};
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});

      if(ar.length!=0){
      for(var i=0;i<ar.length; i++)
    {
      var data = ar[i];
      var uluru = new google.maps.LatLng(data.lat, data.lng);
      var marker = new google.maps.Marker({
        position: uluru,
         map: map,
         titile : data.name,
         html: document.getElementById('form')});

         google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    $("#description").val(ar[i].name);
                    $("#img_float").attr("src","/uploads/"+ar[i].img);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
    }
  }
      
    
}
    </script>
    <div style="display: none" id="form">
            <p>Description:</p>
              <textarea disabled id='description' placeholder='Description'></textarea>
              <img id="img_float" width="12%" alt=""
                                     class="img-circle img-thumbnail img-fluid">

</div>
    <div class = "container">
    <?php if ($blocks): ?>
    <?php foreach ($blocks as $block): ?>
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <div class="single-shop-product">

                                <img id="img_float" width="300px" src="<?= $block->getImage_point() ?>" alt=""
                                     class="img-circle img-thumbnail img-fluid">
                                <div class="name_in_raiting">
                                    <h2>
                                        <a href="<?= Url::toRoute(['site/view', 'id' => $block->id]); ?>"><?= $block->name ?></a>
                                    </h2>
                                    <p class="user-type"><?= $block->type ?></p>
                                </div>
                                <div class="user-info">

                                    <div class="map">
                                        <img width="32px" src="/img/logo/map.png">
                                        <div class="film"><p id="filming_cities_rating"><?= $block->adres ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button"
                                   href="<?= Url::toRoute(['map/view', 'id' => $block->id]); ?>">Дивитись</a>
                            </div>
                        </div>
                    </div>


                </div>
            <?php endforeach; ?>
            <?php endif; ?>
    </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg7YwdcN7qXXMjSiWMitTEKNi0TuwFnGc&callback=initMap">
    </script>
  </head>


