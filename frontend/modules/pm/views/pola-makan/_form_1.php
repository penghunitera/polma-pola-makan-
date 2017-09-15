<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\pm\models\PolaMakan;
/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keterangan-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'minggu')->dropDownList(['1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V'], ['prompt' => 'Select...']); ?>
  <?php
  $id_user = Yii::$app->user->identity->id;
    $data_tgh = PolaMakan::find()->where(['id_user'=> $id_user ])
           // ->andWhere(['status_pembayaran'=>2])
            ->distinct()->all();
    $listBulan = ArrayHelper::map($data_tgh, 'bulan', 'bulan');
    $listTahun = ArrayHelper::map($data_tgh, 'tahun', 'tahun');
?>
    
     <?=
     $form->field($model, 'bulan')->dropDownList(
    $listBulan,
    ['prompt' => 'Pilih Bulan']);
    ?>
     <?=
     $form->field($model, 'tahun')->dropDownList(
    $listTahun,
    ['prompt' => 'Pilih Tahun']);
    ?>
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


 </div>