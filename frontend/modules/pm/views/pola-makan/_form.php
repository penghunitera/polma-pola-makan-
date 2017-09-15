<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pola-makan-form">
  
  
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama_makanan')->dropDownList(
 \yii\helpers\ArrayHelper::map(frontend\modules\pm\models\KandunganGizi::find()->all(),'id','bahan_pangan'),['prompt'=>'Select ..']
            ) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
      
</div>
     