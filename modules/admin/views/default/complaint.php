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
                <th><h4>Lock/Unlock</h4></th>
            </tr>
            </thead>
            <?php foreach($complaints as $complaint):?>
            <tbody>
            <tr>
                <td><h5><p><?= $complaint->id_user?></p></h5></td>
                <td><h5><p><?= $complaint->id_accused?></p></h5></td>
                <td><h5><p><?= $complaint->reason?></p></h5></td>
                <td><h5><p><?= $complaint->content?></p></h5></td>
                <td><h5><p><?= $complaint->vacancy?></p></h5></td>
                <td><h5><p><?= $complaint->talking?></p></h5></td>
                <td><h5><a  href="<?= Url::toRoute(['/admin/default/view-user', 'id_user'=>$user->id]);?>"><?= $user->username?></a></h5></td>
                <td><h5><p><?= $user->type?></p></h5></td>
                <?php if($user->status == 1):?>
                    <td><?= Html::a('Заблокувати', ['lock','id'=>$user->id], ['class' => 'btn btn-danger']) ?></td>
                <?php else:?>
                    <td><?= Html::a('Розблукувати', ['unlock','id'=>$user->id], ['class' => 'btn btn-default']) ?></td>
                <?php endif;?>
            </tr>
            <?php endforeach; ?>
            <tbody>
        </table>
    </div>
</div>




