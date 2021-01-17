<?php

use common\models\Bread;
use common\models\Customers;
use common\models\Meals;
use common\models\Sauce;
use common\models\Taste;
use common\models\Vegetable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>




    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(Customers::find()->asArray()->all(), 'id', 'full_name'), ['prompt' => 'Select Customer'])->label('Select Customer'); ?>
    <?= $form->field($model, 'meal_id')->dropDownList(ArrayHelper::map(Meals::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Meal'])->label('Select Meal'); ?>
    <?= $form->field($model, 'bread_id')->dropDownList(ArrayHelper::map(Bread::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Bread'])->label('Select Bread'); ?>
    <?= $form->field($model, 'bread_size')->dropDownList(['10cm' => '10cm', '20cm' => '20cm', '30cm' => '30cm'], ['prompt' => 'Select Bread Size'])->label('Select Bread Size'); ?>
    <?= $form->field($model, 'is_baked')->radioList(['Yes' => 'Yes', 'No' => 'No']); ?>
    <?= $form->field($model, 'extra')->checkboxList(
        [
            'extra_bacon' => 'Extra Bacon',
            'double_meat' => 'Double meat',
            'extra_cheese' => 'Extra cheese'
        ],
        ['separator' => '<br>']
    ); ?>
    <?= $form->field($model, 'sandwich_taste_id')->dropDownList(ArrayHelper::map(Taste::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Sandwich Taste'])->label('Select Sandwich Taste'); ?>
    <?= $form->field($model, 'vegetable_id')->dropDownList(ArrayHelper::map(Vegetable::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Vegetable'])->label('Select Vegetable'); ?>
    <?= $form->field($model, 'sauce_id')->dropDownList(ArrayHelper::map(Sauce::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Sauce'])->label('Select Sauce'); ?>
    <?= $form->field($model, 'status')->dropDownList(['open' => 'Open', 'closed' => 'Closed',], ['prompt' => 'Select Status']) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>