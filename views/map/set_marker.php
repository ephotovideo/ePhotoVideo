<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;
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
    <div class="container">
    <h3>Додати мітку</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput()->label("Назва")?>
      <?= $form->field($model, 'description')->textarea(['rows' => 10])->label("Опис")?>
      <?= $form->field($model, 'type')->dropDownList([
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
</div>
<?=$form->field($serch, 'address')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
    'attributeLatitude' => 'latitude',
    'attributeLongitude' => 'longitude',
    'googleMapApiKey' => 'AIzaSyAg7YwdcN7qXXMjSiWMitTEKNi0TuwFnGc',
    'draggable' => true,
]);?>
     

      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
            
                <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

         <?php ActiveForm::end(); ?>
         <div class="crop-back-avatar">Додати Коориднати</div>
    <div id="map"></div>