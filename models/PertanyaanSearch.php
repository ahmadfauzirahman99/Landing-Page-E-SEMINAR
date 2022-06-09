<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pertanyaan;

/**
 * PertanyaanSearch represents the model behind the search form about `app\models\Pertanyaan`.
 */
class PertanyaanSearch extends Pertanyaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pertanyaan', 'created_by', 'updated_by'], 'integer'],
            [['pertanyaan', 'jawaban', 'created_at', 'updated_at'], 'safe'],
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
        $query = Pertanyaan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_pertanyaan' => $this->id_pertanyaan,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'pertanyaan', $this->pertanyaan])
            ->andFilterWhere(['like', 'jawaban', $this->jawaban]);

        return $dataProvider;
    }
}
