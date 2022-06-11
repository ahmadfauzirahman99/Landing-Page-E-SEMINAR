<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sponsor".
 *
 * @property int $id_sponsor
 * @property string $nama_sponsor
 * @property string $gambar
 * @property int $id_seminar
 */
class Sponsor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sponsor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_sponsor', 'id_seminar'], 'required'],
            [['id_seminar'], 'integer'],
            [['nama_sponsor'], 'string', 'max' => 30],
            [['gambar'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sponsor' => 'Id Sponsor',
            'nama_sponsor' => 'Nama Sponsor',
            'gambar' => 'Gambar',
            'id_seminar' => 'Seminar',
        ];
    }
}
