<?php

namespace frontend\modules\pm\models;

use Yii;

/**
 * This is the model class for table "akg".
 *
 * @property integer $id
 * @property string $kelompok_umur
 * @property string $jenis_manusia
 * @property double $berat_badan
 * @property double $tinggi_badan
 * @property double $energi
 * @property double $protein
 * @property double $lemak_total
 * @property double $lemakn_6
 * @property double $lemakn_3
 * @property double $karbohidrat
 * @property double $serat
 * @property double $air
 */
class Akg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kelompok_umur', 'jenis_manusia', 'berat_badan', 'tinggi_badan', 'energi', 'protein', 'lemak_total', 'lemakn_6', 'lemakn_3', 'karbohidrat', 'serat', 'air'], 'required'],
            [['berat_badan', 'tinggi_badan', 'energi', 'protein', 'lemak_total', 'lemakn_6', 'lemakn_3', 'karbohidrat', 'serat', 'air'], 'number'],
            [['kelompok_umur'], 'string', 'max' => 255],
            [['jenis_manusia'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelompok_umur' => 'Kelompok Umur',
            'jenis_manusia' => 'Jenis Manusia',
            'berat_badan' => 'Berat Badan',
            'tinggi_badan' => 'Tinggi Badan',
            'energi' => 'Energi',
            'protein' => 'Protein',
            'lemak_total' => 'Lemak Total',
            'lemakn_6' => 'Lemakn 6',
            'lemakn_3' => 'Lemakn 3',
            'karbohidrat' => 'Karbohidrat',
            'serat' => 'Serat',
            'air' => 'Air',
        ];
    }
}
