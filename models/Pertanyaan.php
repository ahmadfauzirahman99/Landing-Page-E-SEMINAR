<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pertanyaan".
 *
 * @property int $id_pertanyaan
 * @property string $pertanyaan
 * @property string $jawaban
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Pertanyaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pertanyaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pertanyaan', 'jawaban'], 'required'],
            [['pertanyaan', 'jawaban'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pertanyaan' => 'Id Pertanyaan',
            'pertanyaan' => 'Pertanyaan',
            'jawaban' => 'Jawaban',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
