<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Breads */

$this->title = 'Update Breads: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Breads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="breads-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
