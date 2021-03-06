<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sponsor;

/**
 * SponsorSearch represents the model behind the search form of `app\models\Sponsor`.
 */
class SponsorSearch extends Sponsor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sponsor', 'id_seminar'], 'integer'],
            [['nama_sponsor', 'gambar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Sponsor::find();

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
            'id_sponsor' => $this->id_sponsor,
            'id_seminar' => $this->id_seminar,
        ]);

        $query->andFilterWhere(['like', 'nama_sponsor', $this->nama_sponsor])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
