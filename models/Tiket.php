<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiket".
 *
 * @property int $id_tiket
 * @property int $id_seminar
 * @property int $harga_tiket
 * @property int $slot_tiket
 * @property string $lampiran_tiket
 */
class Tiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_seminar', 'harga_tiket', 'slot_tiket', 'lampiran_tiket'], 'required'],
            [['id_seminar', 'harga_tiket', 'slot_tiket'], 'integer'],
            [['lampiran_tiket'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tiket' => 'Id Tiket',
            'id_seminar' => 'Id Seminar',
            'harga_tiket' => 'Harga Tiket',
            'slot_tiket' => 'Slot Tiket',
            'lampiran_tiket' => 'Lampiran Tiket',
        ];
    }
}
