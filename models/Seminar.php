<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seminar".
 *
 * @property int $id_seminar
 * @property string $nama_seminar
 * @property string $tgl_pelaksana
 * @property string $lampiran
 * @property string $status
 */
class Seminar extends \yii\db\ActiveRecord
{

    // const AKTIF;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seminar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_seminar', 'tgl_pelaksana'], 'required'],
            [['tgl_pelaksana','status'], 'safe'],
            [['nama_seminar'], 'string', 'max' => 50],
            [['lampiran'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_seminar' => 'Id Seminar',
            'nama_seminar' => 'Nama Seminar',
            'tgl_pelaksana' => 'Tanggal Pelaksana',
            'lampiran' => 'Lampiran',
        ];
    }
}
