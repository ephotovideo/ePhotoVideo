<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown;

?>

<?php if (Yii::$app->user->id === $user_one->id): ?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Ваша сторінка</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="single-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="product-content-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <!--                                    <img src="-->
                                    <? //= $user_one->getImage()?><!--" alt="">-->
                                    <div class="box">
                                        <img src="<?= $user_one->getImage() ?>" alt=""
                                             class="img-circle img-thumbnail img-fluid image">
                                    </div>
                                </div>
                                <?php if (Yii::$app->user->id === $user_one->id || $user_one->isAdmin === 1): ?>
                                    <a class="add_to_cart_button"
                                       href="<?= Url::toRoute(['site/settings', 'id' => Yii::$app->user->id]); ?>">Налаштування
                                        сторінки</a>
                                    <br>
                                    <a class="add_to_cart_button"
                                       href="<?= Url::toRoute(['site/order', 'id' => Yii::$app->user->id]); ?>">Мої
                                        замовлення</a>
                                <?php endif; ?>
                                <?php if (Yii::$app->user->id !== $user_one->id): ?>
                                    <?php echo ButtonDropdown::widget([
                                        'label' => 'Поскаржитись',
                                        'dropdown' => [
                                            'items' => [
                                                ['label' => 'Створює обговорення які не стосуються тематики Сайту', 'url' =>  Url::toRoute(['site/complaint',
                                                    'user_setter'=>Yii::$app->user->id,
                                                    'user_getter' => $talking->user_create,
                                                    'content' => "",
                                                    'vacancy' => "",
                                                    'talk' => "",
                                                    'coment' => "",
                                                    'product' => "",
                                                    'reason' => 'Створює обговорення які не стосуються тематики Сайту',
                                                    'url' => Url::current()
                                                ])],
                                                ['label' => 'Принижує та пропагує до релігійних поглядів, політичних партій угрупувань, сект інших користувачів(фотографів або відемейкерів)', 'url' => '#'],
                                                ['label' => 'Нецензурно виражається в сторону інших користувачів(фотографів або відемейкерів) під час оброворення', 'url' => '/'],
                                            ],
                                        ],
                                    ]); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?= $user_one->username ?></h2>
                                <p id="type"><?= $user_one->type ?></p>
                                <div class="product-inner-price">
                                    <?php if ($user_one->type == "Відеограф" || $user_one->type == "Фотограф"): ?>

                                        <p>Тариф:</p>
                                        <ins>$<?= $user_one->price ?></ins>
                                    <?php endif; ?>
                                    <p>Місто:</p>
                                    <div class="city"><p id="in_city"><?= $user_one->City ?></p></div>
                                    <?php if ($user_one->type == "Відеограф" || $user_one->type == "Фотограф"): ?>
                                        <p>Знімаю в:</p>
                                    <?php endif; ?>
                                    <div class="film"><p id="filming_cities"><?= $user_one->Filming_cities ?></p></div>
                                    <p>Контакти:</p>
                                    <div class="contacts_logo">
                                        <ul>
                                            <li><img src="/img/logo/phone.png"></li>
                                            <li><img src="/img/logo/email.png"></li>
                                            <li><img src="/img/logo/viber.png"></li>
                                            <li><img src="/img/logo/tele.png"></li>
                                            <li><img src="/img/logo/face.png"></li>
                                            <li><img src="/img/logo/insta.png"></li>
                                            <li><img src="/img/logo/store.png"></li>
                                        </ul>
                                    </div>
                                    <div class="contacts_text">
                                        <div><p>:<?= $user_one->phone?></p></div>
                                        <div><p>:<?= $user_one->email?></p></div>
                                        <div><p>:<?= $user_one->telegram?></p></div>
                                        <div><p>:<?= $user_one->viber?></p></div>
                                        <div><a href="<?= $user_one->facebook?>" target="new" id="facebook_link"> : myFacebook</a></div>
                                        <div><p>:<?= $user_one->instagram?></p></div>
                                        <?php if($user_one->type == "Відеограф" ||  $user_one->type == "Фотограф" ): ?>
                                        <div><p>Кількість замовлень:<?= $count?></p></div>   
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($user_one->type == "Відеограф" || $user_one->type == "Фотограф"): ?>
                        <div class="about_" role="tabpanel">
                            <ul class="product-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                          data-toggle="tab">Опис</a></li>

                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <h2><?= $user_one->username ?></h2>
                                    <div class="Description">
                                        <p><?= $user_one->description ?></p>


                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>


            <?php if ($user_one->type == "Відеограф" || $user_one->type == "Фотограф"): ?>
            <div class="col-md-12">
                <h1 id="pop_way" align="center">Мої Послуги
                    <?php if (Yii::$app->user->id == $user_one->id): ?>
                        <?= Html::a('Додати Послугу', ['set-product', 'id' => $user_one->id], ['class' => 'btn btn-default']) ?>
                        <a class="add_to_cart_button" href="<?= Url::toRoute(['site/tmp']);?>">Crop</a>
                        <a class="add_to_cart_button" href="<?= Url::toRoute(['site/check-lock']);?>">Check Lock</a>
                    <?php endif; ?>
                </h1>

                <div id="products">
                    <?php foreach($products as $product):?>
                        <div class="col-md-3">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <div class="picture">
                                        <?php if (Yii::$app->user->id == $user_one->id): ?>
                                            <img src="<?= $product->getImage_Product() ?>" alt="">
                                            <?= Html::a('X', ['delete-product', 'id' => $product->id], ['class' => 'btn btn-danger picture__button']) ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (Yii::$app->user->id != $user_one->id): ?>
                                        <div class="product-hover">
                                            <!-- <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->

                                            <?= Html::a('Замовити', ['set-order', 'user_check' => $user_one->id, 'user_create' => Yii::$app->user->id, 'product' => $product->id], ['class' => 'add-to-cart-link']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <h2><a href=""><?= $product->name_product ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins>$<?= $product->price_product ?></ins>
                                </div>
                                <?php if (Yii::$app->user->id !== $user_one->id): ?>
                                    <?= Html::submitButton('Поскаржитись', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <h2 class="related-products-title">Портфоліо</h2>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Відео</a></li>
                    <li><a href="#tabs-2">Фото</a></li>
                </ul>
                <div id="tabs-1" class="tab-content">
                    <?php if (Yii::$app->user->id == $user_one->id): ?>
                        <?= Html::a('Додати відео', ['set-video', 'id' => $user_one->id], ['class' => 'btn btn-default']) ?>
                    <?php endif; ?>
                    <br>
                    <?php foreach ($contents as $content): ?>
                        <?php if ($content->type == "відео"): ?>
                            <?php if (Yii::$app->user->id == $user_one->id): ?>
                                <?= Html::a('X', ['delete-content', 'id' => $content->id], ['class' => 'btn btn-default']) ?>
                            <?php endif; ?>
                            <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/<?= $content->content ?>" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div id="tabs-2">
                    <div class="form-group">
                        <?php if (Yii::$app->user->id == $user_one->id): ?>
                            <?= Html::a('Завантажити фото', ['set-content', 'id' => $user_one->id], ['class' => 'btn btn-default']) ?>
                        <?php endif; ?>
                    </div>
                    <?php foreach ($contents as $content): ?>
                        <?php if ($content->type == "фото"): ?>
                            <div class="picture">
                                <?php if (Yii::$app->user->id == $user_one->id): ?>
                                    <img width="500px" src="<?= $content->getImage_content() ?>">
                                    <?= Html::a('X', ['delete-content', 'id' => $content->id,], ['class' => 'btn btn-default picture__button']) ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<h2 class="related-products-title">Мої Вакансії</h2>
<div>
    <?php if (Yii::$app->user->id == $user_one->id): ?>
        <?= Html::a('Додати Ваканцію', ['set-vacancy', 'id' => $user_one->id], ['class' => 'btn btn-default']) ?>
    <?php endif; ?>
    <?php foreach ($vacancies as $vacancy): ?>
        <?php if (Yii::$app->user->id == $user_one->id): ?>
            <?= Html::a('X', ['delete-vacancy', 'id' => $vacancy->id], ['class' => 'btn btn-default']) ?>
        <?php endif; ?>
        <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <div class="name_in_raiting">
                            <h2><a href="#"><?= $vacancy->title ?></a></h2>

                        </div>
                        <div class="user-info">

                            <div class="map">
                                <img  width="32px"src="/img/logo/map.png" >
                                <div class="film"><p id="filming_cities_vacancy"><?= $vacancy->location?></p></div>
                            </div>

                            <div class="col-lg-6 block_price">
                                <div class="price-info product-inner-price">
                                    <img src="/img/logo/mon.png">
                                    <p>від</p>
                                    <ins>$<?= $vacancy->price ?></ins>
                                </div>
                            </div>
                            <div class="col-lg-12 block_descripti">
                                <img src="/img/logo/pen.png">
                                <p><?= $vacancy->desciption?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>