<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\Keterangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keterangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktrg')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
