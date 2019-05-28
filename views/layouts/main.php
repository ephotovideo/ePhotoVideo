<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\componets\menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
   
    <!-- <title>eElectronics - HTML eCommerce Template</title> -->
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
  </head>
  
  <body>
  <?php $this->beginBody() ?> 
  <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="/">e<span>PhotoVideo</span></a></h1>
                        <div class="logoII">
                            <img class="position_logo" src="/img/logo/videocam.png">
                            <h2 class="position_logo">/</h2>
                            <img class="position_logo" src="/img/logo/photocame.png">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <?php if(Yii::$app->user->isGuest):?>
    <div class="mainmenu-area">
        <div class="container_">
            <div class="row">
                <div class="navbar-header">
<!--                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                        <span class="sr-only">Toggle navigation</span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                    </button>-->
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav list_margin">
                        <li><a href="/">Головна</a></li>
                        <li><a href="<?=Url::toRoute(['/login'])?>">Увійти</a></li>
                        <li><a href="<?=Url::toRoute(['auth/signup'])?>">Зареєструватися</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <?php else:?>
    <div class="mainmenu-area">
        <div class="container_">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav list_margin_user">
                        <li><a href="/">Головна</a></li>
                        <li><a href="<?= Url::toRoute(['site/view', 'id'=>Yii::$app->user->id]);?>">Моя сторінка</a></li>
                        <li><a href="/site/raiting">Шукати володарів фото\відео камер</a></li>
                        <li><a href="<?=Url::toRoute(['site/vacancy'])?>">ВАКАНСІЇ</a></li>
                        <li><a href="<?=Url::toRoute(['site/talking'])?>">Обговорення</a></li>
                        <li><a href="registr.html">Карта сокровіщ</a></li>
                        <!-- <li><a href="/site/login">Вийти</a></li> -->
                        <li>
                        <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Вийти',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:20px;"]
                            )
                            . Html::endForm() ?>
                            </li>
                        <li><a href="<?=Url::toRoute(['/admin/default/index'])?>">Админ панель</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <?php endif;?>
    
     <?= $content; ?>
    
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2019 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>