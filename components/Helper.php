<?php


namespace app\components;

use app\models\JenisPendidikan;
use app\models\Kuisioner;
use app\models\UserKuisioner;
use DateTime;
use kartik\date\DatePicker;
use Yii;

class Helper
{

    
    public static function MenghitungUmur($tanggal_lahir)
    {
        // tanggal lahir
        $tanggal = new DateTime($tanggal_lahir);

        // tanggal hari ini
        $today = new DateTime('today');

        // tahun
        $y = $today->diff($tanggal)->y;

        // bulan
        $m = $today->diff($tanggal)->m;

        // hari
        $d = $today->diff($tanggal)->d;
        return  $y . " tahun " . $m . " bulan " . $d . " hari";
    }


    public function checkNik($nik)
    {
        if (strlen($nik) < 17) {
            return false;
        }
        return true;
    }
}
