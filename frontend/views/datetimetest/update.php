<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Datetimetest */

$this->title = 'Update Datetimetest: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datetimetests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datetimetest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
