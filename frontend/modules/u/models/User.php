<?php

namespace frontend\modules\u\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 * @property string $created_at
 * @property string $updated_at
 * @property string $last_login
 * @property integer $status
 *
 * @property Profile[] $profiles
 */
class User extends \yii\db\ActiveRecord
{
    public $email;
    public $jenisKelamin;
    public $tanggalLahir;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama_lengkap' ,'email','jenisKelamin','tanggalLahir'], 'required','message'=>'{attribute} harus diisi'],
            [['status'], 'integer'],
            [['id'], 'string', 'max' => 30],
            [['username', 'password', 'created_at', 'updated_at', 'last_login'], 'string', 'max' => 255],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['username'], 'unique','message'=>'{attribute} sudah digunakan'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' =>'Email',
            'jenisKelamin' => 'Jenis Kelamin',
            'tanggalLahir' => 'Tanggal Lahir',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_login' => 'Last Login',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
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
