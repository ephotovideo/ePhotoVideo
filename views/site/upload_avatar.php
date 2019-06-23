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

    <?= $form->field($user, 'image')->fileInput(['maxlength' => true, 'class'=>'avatar-js-file-upload', 'style' => 'display: none;'])->label(false); ?>

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
