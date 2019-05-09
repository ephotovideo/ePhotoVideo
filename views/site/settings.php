<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php if(Yii::$app->user->id != $user_one->id):
     ?>
                                            
                                     <?php else: ?>
                                    
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Налаштування</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-5 col-md-5 col-12">
    <?= Html::a('Змінити фоторафію коритсувача', ['set-image', 'id' => $user_one->id], ['class' => 'btn btn-default']) ?>
    
    <?= $form->field($user_one, 'username')->textInput() ?>

      <?= $form->field($user_one, 'email')->textInput()?>

      <?= $form->field($user_one, 'type')->textInput()?>
      <?php if($user_one->type != "Користувач"): ?>
      <?= $form->field($user_one, 'price')->textInput() ?>
      <?php endif; ?>
      <?= $form->field($user_one, 'City')->textInput() ?>
      <?php if($user_one->type != "Користувач"): ?>
      <?= $form->field($user_one, 'Filming_cities')->textInput() ?>
      <?php endif; ?>
        </div>
        <div class="col-lg-5 col-md-5 col-12">
      <?= $form->field($user_one, 'phone')->textInput() ?>

      <?= $form->field($user_one, 'telegram')->textInput() ?>

      <?= $form->field($user_one, 'viber')->textInput() ?>

      <?= $form->field($user_one, 'facebook')->textInput() ?>

      <?= $form->field($user_one, 'instagram')->textInput() ?>
      <?php if($user_one->type != "Користувач"): ?>
      <?= $form->field($user_one, 'description')->textarea(['rows' => 10]) ?>
      <?php endif; ?>
        </div>
      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>

        </div>

       </div>
        <br>
        <br>
        <br>
        <br>

    <?php endif; ?>
