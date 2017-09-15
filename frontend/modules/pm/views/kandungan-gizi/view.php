<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\KandunganGizi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kandungan Gizis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandungan-gizi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'bahan_pangan',
            'kalori',
            'protein',
            'lemak',
            'karbohidrat',
            'kalsium',
            'posfor',
            'besi',
            'vitamin_a',
            'vitamin_b',
            'vitamin_c',
            'air',
            'bahan',
        ],
    ]) ?>

</div>
