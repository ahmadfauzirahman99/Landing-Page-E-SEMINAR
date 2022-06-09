<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $u_id
 * @property string $username
 * @property string $nama_lengkap
 * @property string $password
 * @property string $email
 * @property string $tgl_pendaftaran
 * @property string $verif
 * @property string $nomor_telpn
 * @property string $users
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nama_lengkap', 'email', 'nomor_telpn', 'password'], 'required'],
            [['password'], 'string'],
            [['tgl_pendaftaran', 'status'], 'safe'],
            [['username', 'nama_lengkap', 'email', 'verif', 'nomor_telpn'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'username' => 'Username',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'email' => 'Email',
            'tgl_pendaftaran' => 'Tanggal Pendaftaran',
            'verif' => 'Verif',
            'nomor_telpn' => 'Nomor Telepon',
        ];
    }
}
