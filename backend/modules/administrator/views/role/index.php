<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\administrator\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Tambah Role', ['create'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('User', ['/administrator/user'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('Route', ['/administrator/route'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Nama Role',
                        'attribute' => 'name',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'options' => [
                            'width' => '220px',
                        ],
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('Detail', ['view', 'id' => $model->name], ['class' => 'btn btn-success']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-warning']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('Delete', ['delete', 'id' => $model->name], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                ]);
                            },
                        ],
                    ],
                ],
            ]);
            ?>
        </div>
    </section>


</div>
