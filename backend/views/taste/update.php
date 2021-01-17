<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tastes */

$this->title = 'Update Tastes: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tastes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tastes-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
