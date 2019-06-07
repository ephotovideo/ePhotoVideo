<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="container">

</div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<div class="container">
    <div class="admin-default-index">

        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-4 col-md-3 col-sm-12">
            <?= $form->field($model, 'type')->dropDownList([
                'Фотограф' => 'Фотограф',
                'Відеограф' => 'Відеограф',
                'Користувач' => 'Користувач',
            ])->label("Тип користувача");?>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12">
        <?= $form->field($model, 'username')->textInput()->label("Нік нейм");?>
            </div>
                <div class="col-lg-4 col-md-3 col-sm-12">
            <?= Html::submitButton('Шукати', ['class' => 'btn btn-primary button', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><h3>ID</h3></th>
                <th><h3>Нікнейм</h3></th>
                <th><h3>Тип користувача</h3></th>
                <th><h3>Lock/Unlock</h3></th>
            </tr>
            </thead>
            <?php foreach($users as $user):?>
            <tbody>
            <tr>
                <td><h4><p><?= $user->id?></p></h4></td>
                <td><h4><a  href="<?= Url::toRoute(['/admin/default/view-user', 'id'=>$user->id]);?>"><?= $user->username?></a></h4></td>
                <td><h4><p><?= $user->type?></p></h4></td>
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
    <h2>Activate Modal with JavaScript</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script>
    $(document).ready(function(){

        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>


