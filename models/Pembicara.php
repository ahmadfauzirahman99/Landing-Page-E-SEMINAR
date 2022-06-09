<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembicara".
 *
 * @property int $id_pembicara
 * @property string $nama_pembicara
 * @property string $latar_belakang
 * @property int $id_seminar
 * @property string $foto
 */
class Pembicara extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembicara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pembicara', 'latar_belakang', 'id_seminar', 'foto'], 'required'],
            [['id_seminar'], 'integer'],
            [['nama_pembicara'], 'string', 'max' => 150],
            [['latar_belakang', 'foto'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembicara' => 'Id Pembicara',
            'nama_pembicara' => 'Nama Pembicara',
            'latar_belakang' => 'Latar Belakang',
            'id_seminar' => 'Seminar',
            'foto' => 'Foto',
        ];
    }

    public function getSem()
    {
        return $this->hasOne(Seminar::className(), ['id_seminar' => 'id_seminar']);
    }
}
