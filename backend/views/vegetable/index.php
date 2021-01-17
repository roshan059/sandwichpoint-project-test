<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VegetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vegetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vegetables-index">

   

    <p>
        <?= Html::a('Create Vegetables', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'title',
            'status',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
