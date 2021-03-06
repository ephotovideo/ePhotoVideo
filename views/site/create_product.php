<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;
?>
<?php $form = ActiveForm::begin([
	'id' => 'uploadproduct-form',
    'options' => ['enctype'=>'multipart/form-data'],
]); ?>

<div class="container">
      <?= $form->field($model, 'name_product')->textInput()->label("Назва")?>
	  <?= $form->field($model, 'price_product')->textInput(['placeholder'=>'$'])->label("Ціна")?>
	  <?= $form->field($model, 'city')->textInput()->label("Міста")?>
	  <?= $form->field($model, 'image')->fileInput(['maxlength' => true, 'class'=>'avatar-js-file-upload', 'style' => 'display: none;'])->label(false); ?>
	<!-- $form->field($img_model, 'image')->widget(CropboxWidget::className(), [
        'croppedDataAttribute' => 'crop_info'
    ]); -->
      
      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Додати фото', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
</div>

         <?php ActiveForm::end(); ?>

<div class="profile-circle-image upload-circle-image hidden">
				<span class="change-avatar-span">Upload Image</span>
</div>

<div id="uploadAvatarImage" class="modal" role="dialog">
	<div class="modal-dialog create-modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload & Crop Image</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div id="avatar_demo" style="width:100%; margin-top:30px"></div>
					</div>
					<div class="col-xs-12 button-crop-image" style="padding-top:30px;">
						<?= Html::submitButton('Зберегти Дані', ['class' => 'btn crop-back-avatar', 'name' => 'login-button']) ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>