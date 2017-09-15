<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\search\KandunganGiziSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kandungan-gizi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bahan_pangan') ?>

    <?= $form->field($model, 'kalori') ?>

    <?= $form->field($model, 'protein') ?>

    <?= $form->field($model, 'lemak') ?>

    <?php // echo $form->field($model, 'karbohidrat') ?>

    <?php // echo $form->field($model, 'kalsium') ?>

    <?php // echo $form->field($model, 'posfor') ?>

    <?php // echo $form->field($model, 'besi') ?>

    <?php // echo $form->field($model, 'vitamin_a') ?>

    <?php // echo $form->field($model, 'vitamin_b') ?>

    <?php // echo $form->field($model, 'vitamin_c') ?>

    <?php // echo $form->field($model, 'air') ?>

    <?php // echo $form->field($model, 'bahan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
