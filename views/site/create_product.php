<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Сворення послуги</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $form = ActiveForm::begin([
    'options' => ['enctype'=>'multipart/form-data'],
]); ?>
<div class="container">
      <?= $form->field($model, 'name_product')->textInput()->label("Назва")?>
      <?= $form->field($model, 'price_product')->textInput(['placeholder'=>'$'])->label("Ціна")?>
      <?= $form->field($img_model, 'image')->widget(CropboxWidget::className(), [
        'croppedDataAttribute' => 'crop_info'
    ]);
      ?>
      
      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
</div>
         <?php ActiveForm::end(); ?>
         <a class="add_to_cart_button" href="<?= Url::toRoute(['site/tmp']);?>">Налаштування сторінки</a>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>

