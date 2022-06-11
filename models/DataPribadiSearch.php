<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataPribadi;

/**
 * DataPribadiSearch represents the model behind the search form of `app\models\DataPribadi`.
 */
class DataPribadiSearch extends DataPribadi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pribadi', 'id_kel'], 'integer'],
            [['u_id', 'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'kewenegaraan', 'agama', 'alamat', 'rt', 'rw', 'kode_pos', 'status', 'no_telp', 'foto', 'id_kec', 'id_kab', 'id_prov', 'lat', 'lng'], 'safe'],
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
        $query = DataPribadi::find();

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
            'id_data_pribadi' => $this->id_data_pribadi,
            'tanggal_lahir' => $this->tanggal_lahir,
            'id_kel' => $this->id_kel,
        ]);

        $query->andFilterWhere(['like', 'u_id', $this->u_id])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'kewenegaraan', $this->kewenegaraan])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'id_kec', $this->id_kec])
            ->andFilterWhere(['like', 'id_kab', $this->id_kab])
            ->andFilterWhere(['like', 'id_prov', $this->id_prov])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng]);

        return $dataProvider;
    }
}
