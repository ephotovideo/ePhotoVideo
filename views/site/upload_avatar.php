<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-big-title-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-bit-title text-center">
                                <h2>Завантаження фото</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="upload">
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image',['labelOptions'=>['style'=>'font-size:24px']])->fileInput(['maxlength' => true])->label("Оберіть фотографію"); ?>

    <div class="form-group">
        <?= Html::submitButton('Завантажити фото', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
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

</div>
</div>
