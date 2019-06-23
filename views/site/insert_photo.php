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
    
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true, 'class'=>'_avatar-js-file-upload_', 'style' => 'display: none;'])->label("Фото"); ?>
    
    <?php ActiveForm::end(); ?>
   
    <div class="profile-circle-image upload-avatar-image">
       
       <span class="change-avatar-span">Upload Image</span>
</div>
<div id="_uploadAvatarImage_" class="modal" role="dialog">
		<div class="modal-dialog create-modal-dialog">
			<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Upload & Crop Image</h4>
      			</div>
      			<div class="modal-body">
        			<div class="row">
  						<div class="col-xs-12 text-center">
							<div id="__avatar_demo" style="width:100%; margin-top:30px"></div>
  						</div>
  						<div class="col-xs-12 button-crop-image" style="padding-top:30px;">
							<?= Html::submitButton('Crop & Upload Image', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
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
<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    var id = <?php  echo $id?>;
 $('.upload-avatar-image').click(function(){
    $('.avatar-js-file-upload').click();
  })

$("._avatar-js-file-upload_").on("change", function(e){
  if($('._avatar-js-file-upload_')[0].files.length == 0){
    return false;
  }

  var my_arr = $('._avatar-js-file-upload_')[0].files[0]['name'].split(".");
  if(my_arr[1] != 'png' && my_arr[1] != 'jpeg' && my_arr[1] != 'jpg') {
    Swal.fire(
      'Pictures Format',
      "Available formats are '.png' '.jpg' or '.jpeg'",
      'info'
    )
    refreshAvatarImageUploader();
    return false;
  }  

  $image_crop = $('#__avatar_demo').croppie('destroy');
  
  $image_crop = $('#__avatar_demo').croppie({
    enableExif: false,
    viewport: {
      width: 750,
      height:550,
      type:'square' //square circle
    },
    boundary:{
      width:750,
      height:550
    }
  })

  var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL($('._avatar-js-file-upload_')[0].files[0]);
    $('#_uploadAvatarImage_').modal('show');
})

$('.btn-danger').click(function(event){
  $image_crop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function(response){
    var formData = new FormData();
    formData.append('image', response);
   formData.append('image_name', $('._avatar-js-file-upload_')[0].files[0]);
   // formData.append('action', 'upload-avatar-image');

    $.ajax({
      url: "/site/set-content/"+id,
      type: 'POST',
      data: formData,
        success: function(){
          $('#_uploadAvatarImage_').modal('hide');
        },
        error: function(){
          alert('Фото завантажено!');
        },
      cache: false,
      contentType: false,
      processData: false
    });
  })
});
</script>
