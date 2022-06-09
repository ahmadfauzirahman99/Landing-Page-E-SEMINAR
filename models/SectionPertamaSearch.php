<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SectionPertama;

/**
 * SectionPertamaSearch represents the model behind the search form of `app\models\SectionPertama`.
 */
class SectionPertamaSearch extends SectionPertama
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_section_pertama', 'created_by', 'updated_by'], 'integer'],
            [['title', 'sub_title', 'gambar', 'created_at', 'updated_at'], 'safe'],
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
        $query = SectionPertama::find();

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
            'id_section_pertama' => $this->id_section_pertama,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'sub_title', $this->sub_title])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
