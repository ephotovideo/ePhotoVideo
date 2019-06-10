<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Реєстрація</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="leave-comment mr0">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="site-login">
                <div class="main-div">
                    <div class="login-page">
                            <div class="doors-right">
                                <h2>Реєс</h2>
                            </div>
                            <div class="doors-left">
                                <h2>трація</h2>
                            </div>
                            <div class="form login-form">
                                    <h2>Реєстрація</h2>
                                    <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-12'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'Нік нейм' ])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false)  ?>
               <?= $form->field($model, 'type')->dropDownList([
        'Фотограф' => 'Фотограф',
        'Відеограф' => 'Відеограф',
        'Користувач' => 'Шукаю Їх',
    ])->label(false) ;?>
                  
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false)  ?>
 
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Реєструватись', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <a href="/login">У мене є акаунт</a>
                    </div>
                </div>
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<br>
<br>
<br>
<br>
<br>    
                          </div>
        </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>

