<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderSerach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'meal_id') ?>

    <?= $form->field($model, 'bread_id') ?>

    <?= $form->field($model, 'bread_size') ?>

    <?php // echo $form->field($model, 'is_baked') ?>

    <?php // echo $form->field($model, 'sandwich_taste_id') ?>

    <?php // echo $form->field($model, 'extra') ?>

    <?php // echo $form->field($model, 'vegetable_id') ?>

    <?php // echo $form->field($model, 'sauce_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'order_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
