<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\KandunganGizi */

$this->title = 'Update Kandungan Gizi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kandungan Gizis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kandungan-gizi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
