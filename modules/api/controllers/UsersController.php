<?php

namespace app\modules\api\controllers;

use app\components\SSPF;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Module` module
 */
class UsersController extends ControllerBase
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


    public function actionUpdateStatusVerifikasi()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $model = Users::findOne($id);
        // var_dump($model);
        // exit;

        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $model->verif = (string)$status;

        if ($model->save()) {
            return $this->writeResponse(true, 'Berhasil Merubah Status');
        } else {
            return $this->writeResponse(false, 'Tidak Berhasil Merubah Status');
        }
    }


    public function actionPasswordDefault()
    {
        $id = $_POST['id'];
        $model = Users::findOne($id);
        $model->password = md5(1234567890);

        if ($model->save()) {
            return $this->writeResponse(true, 'Berhasil Merubah Password Default Menjadi 1234567890');
        } else {
            return $this->writeResponse(false, 'Tidak Berhasil Merubah Password');
        }
    }
}
