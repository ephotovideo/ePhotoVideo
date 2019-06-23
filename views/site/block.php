<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1>ВАШУ СТОРІНКУ ЗАБЛУКОВАНО</h1>
    <h3>У ЗВ'ЯЗКУ З ПОРУШЕННЯМ ПРАВ ПОЛІТИКИ САЙТУ<h3>
    <p>Заблокована за такою причиною</p>
    <br>
    <p><?= $lock->reason ?></p>
    <br>
    <p>Заблокована до</p>
    <br>
    <p><?= $lock->date_end ?></p>
</div>
