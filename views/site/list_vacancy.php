<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>ВАКАНСІЇ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
         <div class="fitr">
            <div class="footer-newsletter">
                <div class="newsletter-form">
                <?php $form = ActiveForm::begin(); ?>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                         <?= $form->field($model, 'location')->dropDownList([
        'Дніпро' => 'Дніпро',
        'Чернігів' => 'Чернігів',
        'Харків' => 'Харків',
        'Житомир' => 'Житомир',
        'Одеса' => 'Одеса',
        'Хмельницький' => 'Хмельницький',
        'Полтава' => 'Полтава',
        'Херсон' => 'Херсон',
        'Київ' => 'Київ',
        'Запоріжжя' => 'Запоріжжя',
        'Вінниця' => 'Вінниця',
        'Миколаїв' => 'Миколаїв',
        'Кропивницький' => 'Кропивницький',
        'Суми' => 'Суми',
        'Львів' => 'Львів',
        'Черкаси' => 'Черкаси',
        'Чернівці' => 'Чернівці',
        'Волинь' => 'Волинь',
        'Рівне' => 'Рівне',
        'Івано=Франківськ' => 'Чернівці',
        'Тернопіль' => 'Тернопіль',
        'Ужгород' => 'Ужгород',
    ])->label("Місто");?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="form-group">
            <?= Html::submitButton('Шукати', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        </div>
         <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
      
            <div class="container">
            <?php foreach($vacancies as $vacancy):?>
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <div class="name_in_raiting">
                                    <h2><a  href="#"><?= $vacancy->title?></a></h2>

                                 </div>
                                 <div class="user-info">
                                        
                                    <div class="map">
                                        <img  width="32px"src="/img/logo/map.png" >
                                        <div class="film"><p id="filming_cities_vacancy"><?= $vacancy->location?></p></div>
                                    </div>
                                    <div>
                                        <img width="30px" src="/img/logo/user.png">
                                        <a  href="<?= Url::toRoute(['site/view', 'id'=>$vacancy->user_fv->id]);?>"><?= $vacancy->user_fv->username ?></a>
                                    </div>
                                     <div class="col-lg-6 block_price">
                                     <div class="price-info product-inner-price">
                                        <img src="/img/logo/mon.png">
                                       <p>від</p>
                                        <ins>$<?= $vacancy->price?></ins>
                                     </div>
                                    </div>
                                    <div class="col-lg-12 block_descripti">
                                            <img src="/img/logo/pen.png">
                                            <p><?= $vacancy->desciption?></p>
                                    </div>   
                                </div>
                                <div class="product-option-shop">
                                    <?php echo ButtonDropdown::widget([
                                        'label' => 'Поскаржитись',
                                        'dropdown' => [
                                            'items' => [
                                                ['label' => 'Створив вакансію яка не стосуються тематики Сайту', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $vacancy->id_user,
                                                    'content' => "",
                                                    'vacancy' => $vacancy->id,
                                                    'talk' => "",
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'Створив вакансію яка не стосуються тематики Сайту',
                                                    'url' => Url::current()
                                                ])],
                                                ['label' => 'В назві вакансії використовує нецензурну лексику', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $vacancy->id_user,
                                                    'content' => "",
                                                    'vacancy' => $vacancy->id,
                                                    'talk' => "",
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'В назві вакансії використовує нецензурну лексику',
                                                    'url' => Url::current()
                                                ])],
                                            ],
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
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