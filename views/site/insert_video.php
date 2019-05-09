<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Завантаження відео</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
<?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'content')->textInput()?>


      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
        <h2>Пам'ятка</h2>
        <p style="font-size:16px"> Відео можна завантажувати тільки з сервісу YouTube </p>
        <p style="font-size:16px"> Щоб завантажити відео потрібно YouTube </p>
        <p style="font-size:16px"> 1. Відкрийте відео на YouTube яке бажаєте званатжити </p>
        <p style="font-size:16px"> 2. Натисніть "Поділитись" </p>
        <img src="/img/Screenshot_2.jpg">
        <p style="font-size:16px"> 3. Скопіюйте "хєш-код" посилання відео(Дивись наступний малюнок) </p>
        <img src="/img/Screenshot_22.jpg">
        <p style="font-size:16px"> 4. Скопійований "хєш-код" вставте у текстове поле і натисніть відправити </p>
        <img src="/img/Screenshot_1233.jpg">
        </div>