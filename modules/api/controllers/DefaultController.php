<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class DefaultController extends ControllerBase
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


    public function actionUserIndex()
    {
        $table = Users::tableName();

        $primarykey = 'u_id';
        $columns = [
            ['db' => 'u_id', 'dt' => 0, 'field' => 'u_id'],
            ['db' => 'username', 'dt' => 1, 'field' => 'username'],
            ['db' => 'nama_lengkap', 'dt' => 2, 'field' => 'nama_lengkap'],
            ['db' => 'email', 'dt' => 3, 'field' => 'email'],
            ['db' => 'tgl_pendaftaran', 'dt' => 4, 'field' => 'tgl_pendaftaran'],
            ['db' => 'verif', 'dt' => 5, 'field' => 'verif'],
            ['db' => 'nomor_telpn', 'dt' => 6, 'field' => 'nomor_telpn'],
            ['db' => 'password', 'dt' => 7, 'field' => 'password'],
        ];

        $con =  YII_ENV_DEV ? Yii::$app->params['conDev'] : Yii::$app->params['conLive'];
        echo json_encode(
            SSPF::simple($_POST, $con, $table, $primarykey, $columns)
        );
        exit();
    }
}
