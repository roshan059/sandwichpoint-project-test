<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Breads */

$this->title = 'Create Breads';
$this->params['breadcrumbs'][] = ['label' => 'Breads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breads-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
