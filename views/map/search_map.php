<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
 <head>
    <style>
      #map {
        height: 400px; 
        width: 100%;  
       }
    </style>
  </head>
  <body>
    
    <a class="add_to_cart_button"
     href="<?= Url::toRoute(['map/set-marker', 'id' => Yii::$app->user->id]); ?>">Налаштування сторінки</a>
     <?php $form = ActiveForm::begin(); ?>
     <?=$form->field($model, 'address')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
    'attributeLatitude' => 'latitude',
    'attributeLongitude' => 'longitude',
    'googleMapApiKey' => 'AIzaSyAg7YwdcN7qXXMjSiWMitTEKNi0TuwFnGc',
    'draggable' => true,
]);?>
     <?php ActiveForm::end(); ?>
    <script>

