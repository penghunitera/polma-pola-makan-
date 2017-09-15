<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\modules\u\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->widget(PasswordInput::classname(), []) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'jenisKelamin')->radio(['label' => 'Pria', 'value' => 'Pria', 'uncheck' => null]) ?>

    <?= $form->field($model, 'jenisKelamin')->radio(['label' => 'Wanita', 'value' => 'Wanita', 'uncheck' => null]) ?>


     <?= DatePicker::widget([
            'model' => $model, 
            'attribute' => 'tanggalLahir',
            'options' => ['placeholder' => 'Masukkan tanggal lahir '],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]);
    ?>
    

    <div class="form-group"><br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
