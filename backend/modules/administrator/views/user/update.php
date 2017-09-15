<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */

$this->title = 'Update User: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>

            <?=
            $this->render('formupdate', [
                'model' => $model,
            ])
            ?>
        </div>
    </section>
</div>
