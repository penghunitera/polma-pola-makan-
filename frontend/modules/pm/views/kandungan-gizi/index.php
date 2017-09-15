<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pm\models\search\KandunganGiziSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kandungan Gizis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandungan-gizi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kandungan Gizi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bahan_pangan',
            'kalori',
            'protein',
            'lemak',
            // 'karbohidrat',
            // 'kalsium',
            // 'posfor',
            // 'besi',
            // 'vitamin_a',
            // 'vitamin_b',
            // 'vitamin_c',
            // 'air',
            // 'bahan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
