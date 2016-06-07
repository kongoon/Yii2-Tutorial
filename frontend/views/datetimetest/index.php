<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DatetimetestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datetimetests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datetimetest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Datetimetest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'datetime1',
            'datetime2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
