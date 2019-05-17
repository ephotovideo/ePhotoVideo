<?php
/**
 * Created by PhpStorm.
 * User: Krager
 * Date: 02.05.2019
 * Time: 22:43
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach($users as $user):?>
    <div class="row">
    <div class=" col-lg-12 col-md-12 col-sm-12">
    <div class="single-shop-product">
    <div class="product-upper">
    <div class="name_in_raiting">
        <h2><a  href="<?= Url::toRoute(['site/view', 'id'=>$user->id]);?>"><?= $user->username?></a></h2>
         <?php if($user->status == 1):?>
          <?= Html::a('Заблокувати', ['unlock','id'=>$user->id], ['class' => 'btn btn-danger']) ?>
           <?php else:?>
        <?= Html::a('Розблукувати', ['lock','id'=>$user->id], ['class' => 'btn btn-default']) ?>
        <p class="user-type"><?= $user->type?></p>
    </div>
<?php endif;?>
<?php endforeach; ?>