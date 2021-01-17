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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
