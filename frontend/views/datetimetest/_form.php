<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

?>

<div class="datetimetest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime1')->widget(MaskedInput::className(), [
        'mask' => '99/99/9999 99:99:99',
    ]) ?>

    <?= $form->field($model, 'datetime2')->widget(MaskedInput::className(), [
        'mask' => '99/99/9999 99:99:99',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
