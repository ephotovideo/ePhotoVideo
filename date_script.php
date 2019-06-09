<?php
use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\UserLock;
use yii\db\Expression;
Yii::$app->db->createCommand('UPDATE user SET status=1 WHERE id = 10')->execute();
?>