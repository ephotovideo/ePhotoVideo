<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;

?>
<body>
    <div class="header">
        <div class="container">
             <div class="col-md-12 col-lg-12">
                <div class="col-md-5 col-lg-5">
                     <img src="<?= $point->getImage_point() ?>" width="75%" alt="" class="img-circle img-thumbnail img-fluid image"></div>
                          <div class="col-md-7 col-lg-7">
                                    <h2 class="product-name"><?= $point->name?></h2>
                                     <p><?= $point->type?></p>
                                     <p><?= $point->adres?></p>
                                         <img width="50px" src="<?=$point->user_fv->getImage();?>">
                                      <a  style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$point->user_fv->id]);?>"><?=$point->user_fv->username ?></a>
                             </div>
                 </div>
             
     <div class="content__">
     <h2>Мої Фото</h2>
     <div id="products">
                    <?php foreach($contents as $content):?>
                        <div class="col-md-3">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <div class="picture">
                                            <img wid src="<?= $content->getImage_content() ?>" alt="">
                                          
                                    </div>
                                    <?php if (Yii::$app->user->id != $user_one->id): ?>
                                        <div class="product-hover">
                                            <?= Html::a('Прикріпти до мітки', ['add-img', 
                                            'id_content' => $content->id, 
                                            'id_point' => $point->id,
                                             'img_content_name' => $content->content,
                                             'img_name_point' => $point->img], ['class' => 'add-to-cart-link']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
     </div>
     </div>
        
     </body>