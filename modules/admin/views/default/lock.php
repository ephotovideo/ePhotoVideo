<?php
/**
 * Created by PhpStorm.
 * User: Krager
 * Date: 24.05.2019
 * Time: 15:51
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="form-group">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'reason')->textInput() ?>
    <?php echo '<label>Start Date/Time</label>';
    echo DateTimePicker::widget([
    'name' => 'datetime_10',
    'options' => ['placeholder' => 'Select operating time ...'],
    'convertFormat' => true,
    'pluginOptions' => [
    'format' => 'd-M-Y g:i A',
    'startDate' => '01-Mar-2014 12:00 AM',
    'todayHighlight' => true
    ]
    ]);?>
    <p>Date: <input type="text" id="datepicker"></p>

    <script>
        $(function () {
            $("#datepicker").datepicker();
        });

    </script>

    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>
