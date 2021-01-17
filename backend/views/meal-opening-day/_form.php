<?php

use common\models\Meals;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MealOpeningDays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meal-opening-days-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meal_id')->dropDownList(ArrayHelper::map(Meals::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Meal'])->label('Select Meal'); ?>

    <?= $form->field($model, 'day_name')->dropDownList(['sunday' => 'Sunday', 'monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday'], ['prompt' => 'Select Day Name']) ?>

    <?= $form->field($model, 'start_time')->input('time') ?>

    <?= $form->field($model, 'end_time')->input('time') ?>
    <!-- meals -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>