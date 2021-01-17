<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sauces */

$this->title = 'Create Sauces';
$this->params['breadcrumbs'][] = ['label' => 'Sauces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sauces-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
