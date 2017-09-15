<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <?php
            $namaItem;
                if($roleUser == NULL){
                    $namaItem ="-";
                }else{
                    $namaItem = $roleUser->item_name;
                }
            ?>
            <h1><?= Html::encode($this->title)." Role:".$namaItem ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',
                    'created_at',
                    'updated_at',
                ],
            ])
            ?>

                <?php $form = ActiveForm::begin([]); ?>
                
<?=
    $form->field($authAssignment, 'item_name')->dropDownList(
            ArrayHelper::map(\hscstudio\mimin\models\AuthItem::find()->where([
				'type' => 1,
			])->all(), 'name', 'name'), ['prompt' => 'Pilih Role'])
    ?>

            <div class="form-group">
            <?=
            Html::submitButton('Update', [
                'class' => $authAssignment->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                    //'data-confirm'=>"Apakah anda yakin akan menyimpan data ini?",
            ])
            ?>
            </div>
<?php ActiveForm::end(); ?>
        </div>
    </section>


</div>
