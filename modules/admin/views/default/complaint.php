<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="container">
    <div class="admin-default-index">


        <table class="table table-hover">
            <thead>
            <tr>
                <th><h4>Хто поскаржився</h4></th>
                <th><h4>На кого</h4></th>
                <th><h4>Причина скарги</h4></th>
                <th><h4>Контент</h4></th>
                <th><h4>Вакансії</h4></th>
                <th><h4>Обговорення</h4></th>
                <th><h4>Коментарі</h4></th>
                <th><h4>Продукти</h4></th>
                <th><h4>Дата Блокування</h4></th>
                <th><h4>Відхилити</h4></th>
                <th><h4>Заблокувати</h4></th>
            </tr>
            </thead>
            <?php foreach($complaints as $complaint):?>
            <tbody>
            <tr>
                <td><h5><p><?= $complaint->getUser($complaint->id_user)->username?></p></h5></td>
                <td><h5><p><?= $complaint->getUser($id_accuse)->username?></p></h5></td>
                <td><h5><p><?= $complaint->reason?></p></h5></td>
                <td><h5><p><?= $complaint->content?></p></h5></td>
                <td><h5><p><?= $complaint->vacancy?></p></h5></td>
                <td><h5><p><?= $complaint->talking?></p></h5></td>
                <td><h5><p><?= $complaint->comments?></p></h5></td>
                <td><h5><p><?= $complaint->products?></p></h5></td>
                <td><h5><p><?= $complaint->date?></p></h5></td>
                <td><?= Html::a('Відхилити', ['delete-complaint','id'=>$complaint->id], ['class' => 'btn btn-primary']) ?></td>
                <td><?= Html::a('Заблокувати', ['lock','id'=>$complaint->id_user], ['class' => 'btn btn-danger']) ?></td>
            </tr>
            <?php endforeach; ?>
            <tbody>
        </table>
    </div>
</div>




