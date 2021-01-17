<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MealOpeningDays */

$this->title = 'Update Meal Opening Days: ' . $model->meal->title;
$this->params['breadcrumbs'][] = ['label' => 'Meal Opening Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meal->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meal-opening-days-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
