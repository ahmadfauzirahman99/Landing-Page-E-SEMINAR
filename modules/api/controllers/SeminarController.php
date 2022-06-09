<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Seminar;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class SeminarController extends ControllerBase
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public $enableCsrfValidation = false;


    public function actionSeminarIndex()
    {
        $table = Seminar::tableName();

        $primarykey = 'id_seminar';
        $columns = [
            ['db' => 'id_seminar', 'dt' => 0, 'field' => 'u_id'],
            ['db' => 'nama_seminar', 'dt' => 1, 'field' => 'nama_seminar'],
            ['db' => 'tgl_pelaksana', 'dt' => 2, 'field' => 'tgl_pelaksana'],
            ['db' => 'lampiran', 'dt' => 3, 'field' => 'lampiran'],
        ];

        $con =  YII_ENV_DEV ? Yii::$app->params['conDev'] : Yii::$app->params['conLive'];
        echo json_encode(
            SSPF::simple($_POST, $con, $table, $primarykey, $columns)
        );
        exit();
    }
}
