<?php

namespace frontend\modules\pm\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pm\models\PolaMakan;

/**
 * PolaMakanSearch represents the model behind the search form about `frontend\modules\pm\models\PolaMakan`.
 */
class PolaMakanSearch extends PolaMakan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tanggal', 'bulan', 'tahun', 'nama_makanan'], 'integer'],
            [['time_created', 'id_user', 'foto'], 'safe'],
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
        $query = PolaMakan::find();

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
            'tanggal' => $this->tanggal,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'nama_makanan' => $this->nama_makanan,
            'time_created' => $this->time_created,
        ]);

        $query->andFilterWhere(['like', 'id_user', Yii::$app->user->identity->id])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
