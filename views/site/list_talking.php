<?php
use yii\helpers\Url;

use yii\widgets\LinkPager;
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
    <div>
    <a class="readmore" href="<?= Url::toRoute(['set-talking']);?>">Створити обговрення</a>
    <a class="readmore" href="<?=Url::toRoute(['site/my-talking'])?>">Мої обговрення</a>
    </div>
         <div class="single-product-area">
      
            <div class="container">
            <?php foreach($talkings as $talk):?>
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <div class="single-shop-product_talking">
                            <div class="product-upper">
                                <div class="name_in_raiting">
                                    <h2><a  href="#"><?= $talk->title?></a></h2>
                                
                                 </div>
                                 <div class="user-info">
                                        
                                    <div>
                                        <img width="30px" src="/img/logo/user.png">
                                        <a  href="<?= Url::toRoute(['site/view', 'id'=>$talk->user_fv->id]);?>"><?= $talk->user_fv->username ?></a>
                                    </div> 
                                    <div class="product-option-shop">
                                <a class="add_to_cart_button" href="<?= Url::toRoute(['view-talking', 'id'=>$talk->id]);?>">Дивитись</a>
                            </div>  
                                </div>  
                            </div>                     
                        </div>
                    </div>     
                </div>    
                <?php endforeach; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                              <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
                            </nav>                        
                        </div>
                    </div>
                </div>
        </div>
    </div>