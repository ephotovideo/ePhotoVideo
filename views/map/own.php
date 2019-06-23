<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Мої </h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="admin-default-index">

        <table class="table table-hover">
            <thead>
            <tr>
                <th><h3>Назва</h3></th>
                <th><h3>Тип</h3></th>
                <th><h3>Адреса</h3></th>
                <th><h3>Видалити</h3></th>
            </tr>
            </thead>
            <?php foreach($points as $point):?>
            <tbody>
            <tr>
                <td><h4><a  href="<?= Url::toRoute(['map/view', 'id' => $point->id]);?>"><?= $point->name?></a></h4></td>
                <td><h4><a  href="<?= Url::toRoute(['map/view', 'id' => $point->id]);?>"><?= $point->type?></a></h4></td>
                <td><h4><a  href="<?= Url::toRoute(['map/view', 'id' => $point->id]);?>"><?= $point->adres?></a></h4></td>
                <td><h4><p><?= $user->type?></p></h4></td>
                <?php if(Yii::$app->user->id == $point->user_id):?>
                    <td><?= Html::a('Видалити мітку', ['delete-point','id'=>$point->id], ['class' => 'btn btn-danger']) ?></td>
                <?php endif;?>
            </tr>
            <?php endforeach; ?>
            <tbody>
        </table>
    </div>
</div>


