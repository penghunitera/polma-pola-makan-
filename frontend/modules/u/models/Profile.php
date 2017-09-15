<?php

namespace frontend\modules\u\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property string $profile_id
 * @property string $user_id
 * @property string $email
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $no_hp
 * @property string $foto
 * @property double $berat_badan
 * @property double $tinggi
 * @property integer $poin
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'tanggal_lahir', 'jenis_kelamin','berat_badan','tinggi'], 'required','message'=>'{attribute} harus diisi'],
            [['alamat'], 'string'],
            [['berat_badan', 'tinggi'], 'number'],
            [['poin'], 'integer'],
            [['profile_id', 'user_id', 'tempat_lahir'], 'string', 'max' => 30],
            [['tanggal_lahir'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['no_hp'], 'string', 'max' => 14],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'user_id' => 'User ID',
            'email' => 'Email',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'foto' => 'Foto',
            'berat_badan' => 'Berat Badan',
            'tinggi' => 'Tinggi',
            'poin' => 'Poin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
