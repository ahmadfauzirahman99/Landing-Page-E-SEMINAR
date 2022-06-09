<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index-new');
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {

            $model->verif = '0';

            $model->password =  md5($_POST['Users']['password']);
            $model->tgl_pendaftaran = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->writeResponse(true, 'Berhasil Menambahkan Data User');
            } else {
                return $this->writeResponse(false, 'Tidak Berhasil Menambahkan Data User', $model->errors);
            }

            // return $this->redirect(['view', 'id' => $model->u_id]);
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    function writeResponse($condition, $msg = null, $data = null)
    {
        $_res = new \stdClass();
        $_res->con = $condition == true ? true : false;
        $_res->msg = $msg;
        $_res->results = $data;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // $response = new \Phalcon\Http\Response();
        // return $response->setContent(json_encode($_res));
        return $_res;
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    return $this->writeResponse(true, 'Berhasil Mengupdate Data User');
                } else {
                    return $this->writeResponse(false, 'Tidak Berhasil Mengupdate Data User', $model->errors);
                }
            }
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
