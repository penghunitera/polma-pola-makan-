<?php

namespace frontend\modules\pm\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pm\models\KandunganGizi;

/**
 * KandunganGiziSearch represents the model behind the search form about `frontend\modules\pm\models\KandunganGizi`.
 */
class KandunganGiziSearch extends KandunganGizi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['bahan_pangan'], 'safe'],
            [['kalori', 'protein', 'lemak', 'karbohidrat', 'kalsium', 'posfor', 'besi', 'vitamin_a', 'vitamin_b', 'vitamin_c', 'air', 'bahan'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = KandunganGizi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kalori' => $this->kalori,
            'protein' => $this->protein,
            'lemak' => $this->lemak,
            'karbohidrat' => $this->karbohidrat,
            'kalsium' => $this->kalsium,
            'posfor' => $this->posfor,
            'besi' => $this->besi,
            'vitamin_a' => $this->vitamin_a,
            'vitamin_b' => $this->vitamin_b,
            'vitamin_c' => $this->vitamin_c,
            'air' => $this->air,
            'bahan' => $this->bahan,
        ]);

        $query->andFilterWhere(['like', 'bahan_pangan', $this->bahan_pangan]);

        return $dataProvider;
    }
}
