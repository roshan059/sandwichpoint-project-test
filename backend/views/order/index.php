<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_at',
            'customer.full_name',
            'meals.title',
            'bread.title',
            'bread_size',
            'is_baked',
            // 'sandwich_taste_id',
            //'extra',
            //'vegetable_id',
            //'sauce_id',
            'status',
            //'location',
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
