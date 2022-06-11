<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Sponsor;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class SponsorController extends ControllerBase
{


    public function actionIndex()
    {
        $table = Sponsor::tableName();

        $primarykey = 'id_sponsor';
        $columns = [
            ['db' => 'p.id_sponsor', 'dt' => 0, 'field' => 'id_sponsor'],
            ['db' => 's.nama_seminar', 'dt' => 1, 'field' => 'nama_seminar'],
            ['db' => 'p.nama_sponsor', 'dt' => 2, 'field' => 'nama_sponsor'],
            ['db' => 'p.gambar', 'dt' => 3, 'field' => 'gambar'],
        ];
        $joinquery = "FROM {$table} p LEFT JOIN seminar s  ON p.id_seminar = s.id_seminar ";

        $con =  YII_ENV_DEV ? Yii::$app->params['conDev'] : Yii::$app->params['conLive'];
        echo json_encode(
            SSPF::simple($_POST, $con, $table, $primarykey, $columns, $joinquery)
        );
        exit();
    }
}
