<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Pembicara;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class PembicaraController extends ControllerBase
{

    public function actionIndex()
    {
        $table = Pembicara::tableName();

        $primarykey = 'id_pembicara';

        $columns = [
            ['db' => 'p.id_pembicara', 'dt' => 0, 'field' => 'id_pembicara'],
            ['db' => 'p.nama_pembicara', 'dt' => 1, 'field' => 'nama_pembicara'],
            ['db' => 'p.latar_belakang', 'dt' => 2, 'field' => 'latar_belakang'],
            ['db' => 's.nama_seminar', 'dt' => 3, 'field' => 'nama_seminar'],
            ['db' => 'p.foto', 'dt' => 4, 'field' => 'foto'],
        ];

        $joinquery = "FROM {$table} p LEFT JOIN seminar s  ON p.id_seminar = s.id_seminar ";
        $con =  YII_ENV_DEV ? Yii::$app->params['conDev'] : Yii::$app->params['conLive'];
        echo json_encode(
            SSPF::simple($_POST, $con, $table, $primarykey, $columns, $joinquery)
        );
        exit();
    }
}
