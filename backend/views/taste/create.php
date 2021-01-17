<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tastes */

$this->title = 'Create Tastes';
$this->params['breadcrumbs'][] = ['label' => 'Tastes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tastes-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
