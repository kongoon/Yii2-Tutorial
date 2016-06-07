<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Datetimetest */

$this->title = 'Create Datetimetest';
$this->params['breadcrumbs'][] = ['label' => 'Datetimetests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datetimetest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
