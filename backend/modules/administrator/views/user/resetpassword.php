<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$titleWeb = 'Reset Password';
$breadcrumbs = 'Daftar User';
$titleform = 'User';
$this->title = $titleWeb;
$this->params['breadcrumbs'][] = ['label' => $breadcrumbs, 'url' => ['index']];
$this->params['breadcrumbs'][] = $titleform;
?>

<div class="row">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <p>
                        <p>Reset Password<font size="4"><b> <?php echo $datauser->username ?></b></font>:</p>
                        </p>
                    </div>
                    <div class="box-body">
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'changepassword-form',
                                    'options' => ['class' => 'form-horizontal'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-lg-5\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
                                        'labelOptions' => ['class' => 'col-lg-2 control-label'],
                                    ],
                        ]);
                        ?>

                        <?=
                        $form->field($model, 'newpass')->passwordInput(['maxlength' => true]);
                        ?>     

                        <?=
                        $form->field($model, 'repeatnewpass', ['inputOptions' => [
                                'placeholder' => 'Repeat New Password'
                    ]])->passwordInput()
                        ?>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-11">
                                <?=
                                Html::submitButton('Change password', [
                                    'class' => 'btn btn-primary'
                                ])
                                ?>
                                <br><br><br>
                                <br><br><br>
                                <br><br><br>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>