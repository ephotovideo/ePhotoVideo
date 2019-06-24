<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\bootstrap\ButtonDropdown;
use yii\base\Widget;
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
                                    <div class="form-group">
                                    <?php echo ButtonDropdown::widget([
                                        'label' => 'Поскаржитись',
                                        'dropdown' => [
                                            'items' => [
                                                ['label' => 'Створює обговорення які не стосуються тематики Сайту', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $talking->user_create,
                                                    'content' => "",
                                                    'vacancy' => "",
                                                    'talk' => $talking->id,
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'Створює обговорення які не стосуються тематики Сайту',
                                                    'url' => Url::current()
                                                    ])],
                                                ['label' => 'Принижує та пропагує до релігійних поглядів, політичних партій угрупувань, сект інших користувачів(фотографів або відемейкерів)', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $talking->user_create,
                                                    'content' => "",
                                                    'vacancy' => "",
                                                    'talk' => $talking->id,
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'Принижує та пропагує до релігійних поглядів, політичних партій угрупувань, сект інших користувачів(фотографів або відемейкерів)',
                                                    'url' => Url::current()
                                                ])],
                                                ['label' => 'Нецензурно виражається в сторону інших користувачів(фотографів або відемейкерів) під час оброворення', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $talking->user_create,
                                                    'content' => "",
                                                    'vacancy' => "",
                                                    'talk' => $talking->id,
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'Нецензурно виражається в сторону інших користувачів(фотографів або відемейкерів) під час оброворення',
                                                    'url' => Url::current()
                                                ])],
                                            ],
                                        ],
                                    ]); ?>
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
                           <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                   </div>
               <?php ActiveForm::end(); ?> 
                     
                    <?php foreach($coments as $coment):?>
                    <div class="single-shop-comment">
                    <img width="50px" src="<?=$coment->getUser($coment->id_user)->getImage();?>">
                        <a  style="font-size:30px;" href="<?= Url::toRoute(['site/view', 'id'=>$coment->getUser($coment->id_user)->id]);?>"><?=$coment->getUser($coment->id_user)->username ?></a>
                        <?php echo ButtonDropdown::widget([
                            'label' => 'Поскаржитись',
                            'dropdown' => [
                                'items' => [
                                    ['label' => 'Нецензурно виражається в сторону інших користувачів(фотографів або відемейкерів) під час оброворення', 'url' =>  Url::toRoute(['site/complaint',
                                        'user_setter'=>Yii::$app->user->id,
                                        'user_getter' => $coment->id_user,
                                        'content' => "",
                                        'vacancy' => "",
                                        'talk' => "",
                                        'coment' => $coment->id,
                                        'product' => "",
                                        'reason' => 'Нецензурно виражається в сторону інших користувачів(фотографів або відемейкерів) під час оброворення',
                                        'url' => Url::current()
                                    ])],
                                    ['label' => 'Принижує та пропагує до релігійних поглядів, політичних партій угрупувань, сект інших користувачів(фотографів або відемейкерів)', 'url' =>  Url::toRoute(['site/complaint',
                                        'user_setter'=>Yii::$app->user->id,
                                        'user_getter' => $coment->id_user,
                                        'content' => "",
                                        'vacancy' => "",
                                        'talk' => "",
                                        'coment' => $coment->id,
                                        'product' => "",
                                        'reason' => 'Принижує та пропагує до релігійних поглядів, політичних партій угрупувань, сект інших користувачів(фотографів або відемейкерів)',
                                        'url' => Url::current()
                                    ])],
                                ],
                            ],
                        ]); ?>
                        </div>
                              <p style="font-size:20px; font-style:italic;"><?=$coment->text?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                </div>      