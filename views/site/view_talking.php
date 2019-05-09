<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Обговорення</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">      
            <div class="container">
            <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <div class="name_in_raiting">
                                    <h2><?= $talking->title?></h2>
                                
                                 </div>
                                 <hr>
                                 <div class="user-info">
                                        
                                        <img width="50px" src="<?=$talking->user_fv->getImage();?>">
                                        <a   style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$talking->user_fv->id]);?>"><?= $talking->user_fv->username ?></a>
                                    </div>
                                    <div class="col-lg-12 block_descripti">
                                            <p style="font-size:20px; font-style:italic;"><?= $talking->text?></p>
                                    </div>   
                                </div>  
                            </div>                       
                            </div>  
                <?php $form = ActiveForm::begin(); ?>
                 <?= $form->field($model, 'text')->textarea(['rows' => 10])?>
    
                 <div class="form-group">
                       <div class="col-lg-offset-1 col-lg-11">
                           <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                       </div>
                   </div>
               <?php ActiveForm::end(); ?> 
                     
                    <?php foreach($coments as $coment):?>
                    <div class="single-shop-comment">
                    <img width="50px" src="<?=$coment->getUser($coment->id_user)->getImage();?>">
                        <a  style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$coment->getUser($coment->id_user)->id]);?>"><?=$coment->getUser($coment->id_user)->username ?></a>
                    </div>
                              <p style="font-size:20px; font-style:italic;"><?=$coment->text?></p>
                    </div>
                    <?php endforeach; ?>  
                </div>
                </div>      