<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sauces */

$this->title = 'Update Sauces: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sauces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sauces-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
