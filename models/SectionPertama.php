<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section_pertama".
 *
 * @property int $id_section_pertama
 * @property string $title
 * @property string $sub_title
 * @property string $gambar
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class SectionPertama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_pertama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'sub_title'], 'required'],
            [['title', 'gambar'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['sub_title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_section_pertama' => 'Id Section Pertama',
            'title' => 'Title',
            'sub_title' => 'Sub Title',
            'gambar' => 'Gambar',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
