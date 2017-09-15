<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */

$this->title = 'Update Pola Makan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pola Makans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pola-makan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
