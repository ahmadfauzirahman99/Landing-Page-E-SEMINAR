<?php

namespace app\controllers;

use Yii;
use app\models\Tiket;
use app\models\TiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * TiketController implements the CRUD actions for Tiket model.
 */
class TiketController extends Controller
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
     * Lists all Tiket models.
     * @return mixed
     */
    public function actionIndex()
    {


        return $this->render('index-tiket', []);
    }

    /**
     * Displays a single Tiket model.
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
     * Creates a new Tiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tiket();

        if ($model->load(Yii::$app->request->post())) {
            $microtime = microtime(true);

            $lampiran_tiket = UploadedFile::getInstance($model, 'lampiran_tiket');

            if (isset($lampiran_tiket)) {
                $file_lampiran_tiket_lama = $model->lampiran_tiket;
                $model->lampiran_tiket = rand(1, 5000) . '-lampiran_tiket-' . $microtime . '.' . $lampiran_tiket->getExtension() ?? $model->lampiran_tiket;
            }

            if ($model->save()) {
                if (isset($lampiran_tiket)) {
                    file_exists('@app/web/lampiran-tiket-seminar/' . $file_lampiran_tiket_lama) ? unlink(Url::to('@app/web/lampiran-tiket-seminar/' . $file_lampiran_tiket_lama)) : null;
                    $lampiran_tiket->saveAs('@app/web/lampiran-tiket-seminar/' . $model->lampiran_tiket);
                }
                return $this->writeResponse(true, 'Berhasil Menginput Data');
            } else {
                return $this->writeResponse(false, 'Tidak Berhasil Menginput Data', $model->errors);
            }
        }

        if (Yii::$app->request->isAjax) {
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
     * Updates an existing Tiket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->lampiran_tiket;
        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'lampiran_tiket');

            if (isset($img)) {
                $lampiran_tiket_lama = $model->lampiran_tiket;
                $model->lampiran_tiket = rand(1, 5000)  . '_lampiran_tiket.' . $img->getExtension() ?? $model->lampiran_tiket;
            } else {
                $model->lampiran_tiket = $oldImage;
            }

            if ($model->save()) {
                if (isset($img)) {
                    file_exists('@app/web/lampiran-tiket-seminar/' . $lampiran_tiket_lama) ? unlink(Url::to('@app/web/lampiran-tiket-seminar/' . $lampiran_tiket_lama)) : null;
                    $img->saveAs('@app/web/lampiran-tiket-seminar/' . $model->lampiran_tiket);
                }
                return $this->writeResponse(true, 'Berhasil Menginput Data');
            } else {
                return $this->writeResponse(false, 'Tidak Berhasil Menginput Data', $model->errors);
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
     * Deletes an existing Tiket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id)->delete();
        if ($model) {
            return $this->writeResponse(true, 'Berhasil Menghapus Seminar');
        } else {

            return $this->writeResponse(false, 'Tidak Berhasil Menghapus Seminar');
        }
    }

    /**
     * Finds the Tiket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tiket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tiket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
