<?php
/* @var $this yii\web\View */

use common\models\Bread;
use common\models\Sauce;
use common\models\Taste;
use common\models\Vegetable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



$this->title = 'Order History';
$this->params['breadcrumbs'][] = ['label' => 'Orders History', 'url' => ['history','id' => $order->meal_id,'token'=> $token]];
$this->params['breadcrumbs'][] = $order->meals->title;

        // $this->title = 'Update Orders: ' . $model->id;
        // $this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
        // $this->params['breadcrumbs'][] = ['label' => $model->meals->title, 'url' => ['view', 'id' => $model->id]];
        // $this->params['breadcrumbs'][] = 'Update';
?>


<h1>Your ordered Meal: <?= $order->meals->title ?></h1>

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($order, 'bread_id')->dropDownList(ArrayHelper::map(Bread::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Meal'])->label('Select Meal'); ?>
<?= $form->field($order, 'bread_size')->dropDownList(['10cm' => '10cm', '20cm' => '20cm', '30cm' => '30cm'], ['prompt' => 'Select Bread Size'])->label('Select Bread Size'); ?>
<?= $form->field($order, 'is_baked')->radioList(['yes' => 'Yes', 'no' => 'No']); ?>
<?= $form->field($order, 'sandwich_taste_id')->dropDownList(ArrayHelper::map(Taste::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Sandwich taste'])->label('Select Sandwich taste'); ?>
<?= $form->field($order, 'extra')->checkboxList(
    [
        'extra_bacon' => 'Extra Bacon',
        'double_meat' => 'Double meat',
        'extra_cheese' => 'Extra cheese'
    ],
    ['separator' => '<br>']
); ?>

<?= $form->field($order, 'vegetable_id')->dropDownList(ArrayHelper::map(Vegetable::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select vegetable'])->label('Select vegetable'); ?>
<?= $form->field($order, 'sauce_id')->dropDownList(ArrayHelper::map(Sauce::find()->asArray()->all(), 'id', 'title'), ['prompt' => 'Select Sauce'])->label('Select Sauce'); ?>
<?= $form->field($order, 'location')->textInput(['maxlength' => true]) ?>





<div class="form-group">
    <?= Html::submitButton('Update Order', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>