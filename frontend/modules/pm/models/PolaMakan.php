<?php

namespace frontend\modules\pm\models;

use Yii;

/**
 * This is the model class for table "pola_makan".
 *
 * @property integer $id
 * @property integer $tanggal
 * @property integer $bulan
 * @property integer $tahun
 * @property integer $nama_makanan
 * @property string $time_created
 * @property string $id_user
 * @property string $foto
 *
 * @property KandunganGizi $namaMakanan
 * @property User $idUser
 */
class PolaMakan extends \yii\db\ActiveRecord
{
    public $minggu;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pola_makan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'bulan', 'tahun', 'nama_makanan', 'id_user'], 'required'],
            [['tanggal', 'bulan', 'tahun', 'nama_makanan','minggu'], 'integer'],
            [['time_created'], 'safe'],
            [['id_user'], 'string', 'max' => 30],
            [['foto'], 'string', 'max' => 255],
            [['nama_makanan'], 'exist', 'skipOnError' => true, 'targetClass' => KandunganGizi::className(), 'targetAttribute' => ['nama_makanan' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => \frontend\modules\u\models\User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'nama_makanan' => 'Nama Makanan',
            'time_created' => 'Time Created',
            'id_user' => 'Id User',
            'foto' => 'Foto',
            'minggu' => 'Pilih Minggu'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaMakanan()
    {
        return $this->hasOne(KandunganGizi::className(), ['id' => 'nama_makanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
