<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\u\models\Profile */

$this->title = Yii::$app->user->identity->nama_lengkap;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'q' => $model->profile_id], ['class' => 'btn btn-primary']) ?>
            
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label'=> 'Foto',
                        'attribute'=>'foto',
                        'value'=>function($model)
                        {   
                            if($model->foto== NULL || $model->foto== "-"){
                                return Yii::getAlias('../../../imagesUser').'/no-image.png';
                            }else{
                                return Yii::getAlias('../../../imagesUser').'/'.$model->foto;
                            }
                        }, 
                        'format' =>  ['image',['width'=>'150','height'=>'170']],
                    ],
                    'email:email',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'jenis_kelamin',
                    'alamat:ntext',
                    'no_hp',
                    
                    'berat_badan',
                    'tinggi',
                    'poin',
                ],
            ])
            ?>
        </div>
    </section>
</div>
