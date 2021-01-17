<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Vegetables */

$this->title = 'Update Vegetables: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vegetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vegetables-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
