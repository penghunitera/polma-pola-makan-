<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\KandunganGizi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kandungan-gizi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bahan_pangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kalori')->textInput() ?>

    <?= $form->field($model, 'protein')->textInput() ?>

    <?= $form->field($model, 'lemak')->textInput() ?>

    <?= $form->field($model, 'karbohidrat')->textInput() ?>

    <?= $form->field($model, 'kalsium')->textInput() ?>

    <?= $form->field($model, 'posfor')->textInput() ?>

    <?= $form->field($model, 'besi')->textInput() ?>

    <?= $form->field($model, 'vitamin_a')->textInput() ?>

    <?= $form->field($model, 'vitamin_b')->textInput() ?>

    <?= $form->field($model, 'vitamin_c')->textInput() ?>

    <?= $form->field($model, 'air')->textInput() ?>

    <?= $form->field($model, 'bahan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
