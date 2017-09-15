<?php

namespace frontend\modules\pm\models;

use Yii;

/**
 * This is the model class for table "kandungan_gizi".
 *
 * @property integer $id
 * @property string $bahan_pangan
 * @property double $kalori
 * @property double $protein
 * @property double $lemak
 * @property double $karbohidrat
 * @property double $kalsium
 * @property double $posfor
 * @property double $besi
 * @property double $vitamin_a
 * @property double $vitamin_b
 * @property double $vitamin_c
 * @property double $air
 * @property double $bahan
 *
 * @property PolaMakan[] $polaMakans
 */
class KandunganGizi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kandungan_gizi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahan_pangan', 'kalori', 'protein', 'lemak', 'karbohidrat', 'kalsium', 'posfor', 'besi', 'vitamin_a', 'vitamin_b', 'vitamin_c', 'air', 'bahan'], 'required'],
            [['kalori', 'protein', 'lemak', 'karbohidrat', 'kalsium', 'posfor', 'besi', 'vitamin_a', 'vitamin_b', 'vitamin_c', 'air', 'bahan'], 'number'],
            [['bahan_pangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bahan_pangan' => 'Bahan Pangan',
            'kalori' => 'Kalori',
            'protein' => 'Protein',
            'lemak' => 'Lemak',
            'karbohidrat' => 'Karbohidrat',
            'kalsium' => 'Kalsium',
            'posfor' => 'Posfor',
            'besi' => 'Besi',
            'vitamin_a' => 'Vitamin A',
            'vitamin_b' => 'Vitamin B',
            'vitamin_c' => 'Vitamin C',
            'air' => 'Air',
            'bahan' => 'Bahan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolaMakans()
    {
        return $this->hasMany(PolaMakan::className(), ['nama_makanan' => 'id']);
    }
}
