<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pembicara;

/**
 * PembicaraSearch represents the model behind the search form of `app\models\Pembicara`.
 */
class PembicaraSearch extends Pembicara
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembicara', 'id_seminar'], 'integer'],
            [['nama_pembicara', 'latar_belakang', 'foto'], 'safe'],
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
        $query = Pembicara::find();

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
            'id_pembicara' => $this->id_pembicara,
            'id_seminar' => $this->id_seminar,
        ]);

        $query->andFilterWhere(['like', 'nama_pembicara', $this->nama_pembicara])
            ->andFilterWhere(['like', 'latar_belakang', $this->latar_belakang])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
