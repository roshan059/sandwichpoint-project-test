<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Vegetables */

$this->title = 'Create Vegetables';
$this->params['breadcrumbs'][] = ['label' => 'Vegetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vegetables-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
