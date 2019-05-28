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
                        <h2>Замовдення Клієнтів</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="accordion">
    <?php foreach($products as $product):?>
         <h3><?= $product->name_product?></h3>
            <div>
            <p>Кількість замовлень:<?= $product->countOrder(Yii::$app->user->id,$product->id)?></p>
            <?php foreach($orders as $order):?>
                <?php if($order->id_product == $product->id):?>
                    <img width="50px" src="<?=$order->getUser($order->user_create)->getImage();?>">
                    <a  style="font-size:24px;" href="<?= Url::toRoute(['site/view', 'id'=>$order->getUser($order->user_create)->id]);?>"><?=$order->getUser($order->user_create)->username ?></a>
                    <p><?=$order->date;?></p>
                    <p><?=$order->getUser($order->user_create)->City;?></p>
                    <p><?=$order->getUser($order->user_create)->phone;?></p>
                    <?= Html::a('Замовлення виконано', ['delete-order','id'=>$order->id], ['class' => 'btn btn btn-success']) ?>
                <?php endif;?>
            <?php endforeach; ?>
            </div>
     <?php endforeach; ?>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
                $( function() {
    $( "#accordion" ).accordion();
  } );                
        </script>