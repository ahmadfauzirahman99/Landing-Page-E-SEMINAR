<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pribadi".
 *
 * @property int $id_data_pribadi
 * @property string $u_id
 * @property string $nama_lengkap
 * @property string $nik
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $kewenegaraan
 * @property string $agama
 * @property string $alamat
 * @property int $id_kel
 * @property string $rt
 * @property string $rw
 * @property string $kode_pos
 * @property string $status
 * @property string $no_telp
 * @property string $foto
 * @property string $id_kec
 * @property string $id_kab
 * @property string $id_prov
 * @property string $lat
 * @property string $lng
 */
class DataPribadi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pribadi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['alamat', 'foto'], 'string'],
            [['id_kel'], 'integer'],
            [['u_id', 'jenis_kelamin', 'kewenegaraan', 'agama', 'rt', 'rw', 'status', 'no_telp', 'id_kec', 'id_kab', 'id_prov', 'lat', 'lng'], 'string', 'max' => 100],
            [['nama_lengkap'], 'string', 'max' => 150],
            [['nik', 'tempat_lahir'], 'string', 'max' => 200],
            [['kode_pos'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_data_pribadi' => 'Id Data Pribadi',
            'u_id' => 'U ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'No. NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'kewenegaraan' => 'Kewenegaraan',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'id_kel' => 'Kelurahan',
            'rt' => 'RT',
            'rw' => 'RW',
            'kode_pos' => 'Kode Pos',
            'status' => 'Status',
            'no_telp' => 'No. Telepon',
            'foto' => 'Foto',
            'id_kec' => 'Kecamatan',
            'id_kab' => 'Kabupaten',
            'id_prov' => 'Provinsi',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        ];
    }
}
