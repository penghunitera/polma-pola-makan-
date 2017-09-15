<?php

namespace frontend\modules\pm\models;

use Yii;

/**
 * This is the model class for table "keterangan".
 *
 * @property integer $id
 * @property string $nama_keterangan
 * @property string $ktrg
 */
class Keterangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keterangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_keterangan', 'ktrg'], 'required'],
            [['ktrg'], 'string'],
            [['nama_keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_keterangan' => 'Nama Keterangan',
            'ktrg' => 'Ktrg',
        ];
    }
}
