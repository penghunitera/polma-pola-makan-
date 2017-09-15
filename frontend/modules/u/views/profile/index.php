<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\u\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'profile_id',
            'user_id',
            'email:email',
            'tempat_lahir',
            'tanggal_lahir',
            // 'jenis_kelamin',
            // 'alamat:ntext',
            // 'no_hp',
            // 'foto',
            // 'berat_badan',
            // 'tinggi',
            // 'poin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
