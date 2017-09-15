<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\RouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Routes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-index">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Route', ['create'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('Generate Route', ['generate'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('User', ['/administrator/user'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('Role', ['/administrator/role'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Tipe',
                        'attribute' => 'type',
                    ],
                    [
                        'header' => 'Alias',
                        'attribute' => 'alias',
                    ],
                    [
                        'header' => 'Nama',
                        'attribute' => 'name',
                    ],
                    [
                        'header' => 'Status',
                        'attribute' => 'status',
                        'filter' => [0 => 'off', 1 => 'on'],
                        'format' => 'raw',
                        'options' => [
                            'width' => '80px',
                        ],
                        'value' => function ($data) {
                    if ($data->status == 1)
                        return "<span class='label label-primary'>" . 'On' . "</span>";
                    else
                        return "<span class='label label-danger'>" . 'Off' . "</span>";
                }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </section>
</div>
