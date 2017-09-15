<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('Role', ['/administrator/role'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                <?= Html::a('Route', ['/administrator/route'], ['class' => 'btn btn-primary btn-i-sm uppercase txt-sm']) ?>
                
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Username',
                        'attribute' => 'username',
                    ],
                    [
                        'header' => 'Email',
                        'attribute' => 'email',
                    ],
                    [
                        'header' => 'Role',
                        'attribute' => 'roles',
                        'format' => 'raw',
                        'value' => function ($data) {
                            $roles = [];
                            foreach ($data->roles as $role) {
                                $roles[] = $role->item_name;
                            }
                            return Html::a(implode(', ', $roles), ['view', 'id' => $data->id]);
                        }
                            ],
                            [
                                'header' => 'Status',
                                'attribute' => 'status',
                                'format' => 'raw',
                                'options' => [
                                    'width' => '80px',
                                ],
                                'value' => function ($data) {
                            if ($data->status == 10)
                                return "<span class='label label-primary'>" . 'Active' . "</span>";
                            else
                                return "<span class='label label-danger'>" . 'Banned' . "</span>";
                        }
                            ],
                            [
                                'header' => 'Dibuat tanggal',
                                'attribute' => 'created_at',
                                'format' => ['date', 'php:d M Y H:i:s'],
                                'options' => [
                                    'width' => '120px',
                                ],
                            ],
                            [
                                'header' => 'Diudpate tanggal',
                                'attribute' => 'updated_at',
                                'format' => ['date', 'php:d M Y H:i:s'],
                                'options' => [
                                    'width' => '120px',
                                ],
                            ],
                            [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}{reset}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('Detail', ['view', 'id' => $model->id], ['class' => 'btn btn-success']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                ]);
                            },
                            'reset' => function ($url, $model) {
                                return Html::a('Reset Password', ['resetpassword', 'id' => $model->id], ['class' => 'btn btn-warning']);
                            },
                        ],
                    ],
                        ],
                    ]);
                    ?>
        </div>
    </section>


</div>
