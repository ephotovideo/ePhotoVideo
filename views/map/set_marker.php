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
    <h3>Додати мітку</h3>
    <div class="container">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput()->label("Назва")?>
      <?= $form->field($model, 'description')->textarea(['rows' => 10])->label("Опис")?>
      <?= $form->field($model, 'type')->dropDownList([
        'Вся Україна' => 'Вся Україна',
        'Дніпро' => 'Дніпро',
        'Чернігів' => 'Чернігів',
        'Харків' => 'Харків',
        'Житомир' => 'Житомир',
        'Одеса' => 'Одеса',
        'Хмельницький' => 'Хмельницький',
        'Полтава' => 'Полтава',
        'Херсон' => 'Херсон',
        'Київ' => 'Київ',
        'Запоріжжя' => 'Запоріжжя',
        'Вінниця' => 'Вінниця',
        'Миколаїв' => 'Миколаїв',
        'Кропивницький' => 'Кропивницький',
        'Суми' => 'Суми',
        'Львів' => 'Львів',
        'Черкаси' => 'Черкаси',
        'Чернівці' => 'Чернівці',
        'Волинь' => 'Волинь',
        'Рівне' => 'Рівне',
        'Івано=Франківськ' => 'Чернівці',
        'Тернопіль' => 'Тернопіль',
        'Ужгород' => 'Ужгород',
    ])->label("Тип");?>
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