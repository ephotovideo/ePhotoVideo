<?php
/**
 * Created by PhpStorm.
 * User: Krager
 * Date: 24.05.2019
 * Time: 15:51
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="form-group">
    <? $form = ActiveForm::begin()?>
    <?= $form->field($model, 'reason')->textInput() ?>
    <?= $form->field($model, 'date_end')->widget(DateTimePicker::className(), [
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy H:i',// час тоже
            'todayHighlight' => true
        ]
    ])?>
    <!-- <p>Date: <input type="text" id="datepicker"></p> -->


    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>

