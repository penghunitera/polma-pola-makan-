<?php

namespace backend\modules\administrator\models;;

use Yii;
use yii\base\Model;

class ResetPassword extends Model {

    public $newpass;
    public $repeatnewpass;

    public function rules() {
        return [
            [['newpass', 'repeatnewpass'], 'required','message'=> '{attribute} Tidak boleh kosong'],
            ['repeatnewpass', 'compare', 'compareAttribute' => 'newpass'],
         //   [['newpass'], StrengthValidator::className(), 'preset' => 'normal']
        ];
    }

    

    public function attributeLabels() {
        return [
            'newpass' => 'New Password',
            'repeatnewpass' => 'Repeat New Password',
        ];
    }
}

?>