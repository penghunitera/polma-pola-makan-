<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pola Makans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-makan-view">

    
 <section id="features">
        <div class="container"><br><br><br>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
     
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         
          
            'namaMakanan.bahan_pangan',
            'time_created',
        
            
               [
                        'label'=> 'Foto',
                        'attribute'=>'foto',
                        'value'=>function($model)
                        {   
                            if($model->foto== NULL || $model->foto== "-"){
                                return Yii::getAlias('../../../imagesUser').'/no-image.png';
                            }else{
                               return Yii::getAlias('../../../uploads').'/'.$model->foto;
                            }
                        }, 
                        'format' =>  ['image',['width'=>'150','height'=>'170']],
                    ],
        ],
    ]) ?>
</div>
</section>
</div>
