


    $('.upload-circle-image').click(function(){
      $('.avatar-js-file-upload').click();
    })
  
  
  
    $(".avatar-js-file-upload").on("change", function(e){
      if($('.avatar-js-file-upload')[0].files.length == 0){
        return false;
      }
    
      var my_arr = $('.avatar-js-file-upload')[0].files[0]['name'].split(".");
      if(my_arr[1] != 'png' && my_arr[1] != 'jpeg' && my_arr[1] != 'jpg') {
        Swal.fire(
          'Pictures Format',
          "Available formats are '.png' '.jpg' or '.jpeg'",
          'info'
        )
        refreshAvatarImageUploader();
        return false;
      }  
    
      $image_crop = $('#avatar_demo').croppie('destroy');
      
      $image_crop = $('#avatar_demo').croppie({
        enableExif: false,
        viewport: {
          width: 250,
          height:250,
          type:'square' //square circle
        },
        boundary:{
          width:500,
          height:500
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
        reader.readAsDataURL($('.avatar-js-file-upload')[0].files[0]);
        $('#uploadAvatarImage').modal('show');
    })
  
    $('.crop-back-avatar').click(function(event){
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
        var formData = new FormData();
        formData.append('image', response);
       formData.append('image_name', $('.avatar-js-file-upload')[0].files[0]);
       // formData.append('action', 'upload-avatar-image');
    
        $.ajax({
          url: "/site/set-product",
          type: 'POST',
          data: formData,
            success: function(){
              alert("hello");
              $('#uploadAvatarImage').modal('hide');
            },
            error: function(){
              alert('Error!');
            },
          cache: false,
          contentType: false,
          processData: false
        });
      })
    });
  