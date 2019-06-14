<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

    
    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Рейтинг</h2>
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
                     <?= $form->field($model, 'type')->dropDownList([
                         'Фотограф' => 'Фотограф',
                         'Відеограф' => 'Відеограф',
                     ])->label("Тип користувача");?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                         <?= $form->field($model, 'Filming_cities')->dropDownList([
        'Вся Україна' => 'Вся Україна',
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
     <?= $form->field($model, 'username')->textInput()->label("Нік нейм");?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
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
            <div class="zigzag-bottom"></div>
        <div class="container">
            <?php foreach ($users as $user): ?>
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <!--                                <img id="img_float" width="300px" src="-->
                                <? //=$user->getImage_raiting() ?><!--" alt="">-->
                                <img id="img_float" width="300px" src="<?= $user->getImage_raiting() ?>" alt=""
                                     class="img-circle img-thumbnail img-fluid">
                                <div class="name_in_raiting">
                                    <h2>
                                        <a href="<?= Url::toRoute(['site/view', 'id' => $user->id]); ?>"><?= $user->username ?></a>
                                    </h2>
                                    <p class="user-type"><?= $user->type ?></p>
                                </div>
                                <div class="user-info">

                                    <div class="map">
                                        <img width="32px" src="/img/logo/map.png">
                                        <div class="film"><p id="filming_cities_rating"><?= $user->Filming_cities ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 block_price">
                                        <div class="price-info product-inner-price">
                                            <img src="/img/logo/mon.png">
                                            <p>від</p>
                                            <ins><?= $user->price ?>$</ins>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 block_rating">

                                        <div class="price-info product-inner-price">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="/img/logo/pen.png">
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                    <p class="text-justify"><?= $user->description ?></p>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button"
                                   href="<?= Url::toRoute(['site/view', 'id' => $user->id]); ?>">Дивитись</a>
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