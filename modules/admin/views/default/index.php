<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="container">
<div class="admin-default-index">

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
</div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
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

<script>
    $(document).ready(function(){

        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>


