<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Tiket;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class TiketController extends ControllerBase
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $table = Tiket::tableName();

        $primarykey = 'id_tiket';

        $columns = [
            ['db' => 't.id_tiket', 'dt' => 0, 'field' => 'id_tiket'],
            ['db' => 's.nama_seminar', 'dt' => 1, 'field' => 'nama_seminar'],
            ['db' => 't.harga_tiket', 'dt' => 2, 'field' => 'harga_tiket'],
            ['db' => 't.slot_tiket', 'dt' => 3, 'field' => 'slot_tiket'],
            ['db' => 't.lampiran_tiket', 'dt' => 4, 'field' => 'lampiran_tiket'],
        ];

        $joinquery = "FROM {$table} t LEFT JOIN seminar s  ON t.id_seminar = s.id_seminar ";
        $con =  YII_ENV_DEV ? Yii::$app->params['conDev'] : Yii::$app->params['conLive'];
        echo json_encode(
            SSPF::simple($_POST, $con, $table, $primarykey, $columns, $joinquery)
        );
        exit();
    }
    public $enableCsrfValidation = false;
}
