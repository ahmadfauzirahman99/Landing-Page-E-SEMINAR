<?php

namespace app\controllers;

use Yii;
use app\models\Pembicara;
use app\models\PembicaraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * PembicaraController implements the CRUD actions for Pembicara model.
 */
class PembicaraController extends Controller
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
     * Lists all Pembicara models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index-pembicara', []);
    }

    /**
     * Displays a single Pembicara model.
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
     * Creates a new Pembicara model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembicara();

        if ($model->load(Yii::$app->request->post())) {
            $microtime = microtime(true);

            $foto = UploadedFile::getInstance($model, 'foto');

            if (isset($foto)) {
                $file_foto_lama = $model->foto;
                $model->foto = rand(1, 5000) . '-foto-' . $microtime . '.' . $foto->getExtension() ?? $model->foto;
            }

            if ($model->save()) {
                if (isset($foto)) {
                    file_exists('@app/web/foto-seminar/' . $file_foto_lama) ? unlink(Url::to('@app/web/foto-seminar/' . $file_foto_lama)) : null;
                    $foto->saveAs('@app/web/foto-seminar/' . $model->foto);
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
     * Updates an existing Pembicara model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldImage = $model->foto;
        if (Yii::$app->request->post()) {


            $img = UploadedFile::getInstance($model, 'foto');

            if (isset($img)) {
                $foto_lama = $model->foto;
                $model->foto = $model->id_pembicara . '_foto.' . $img->getExtension() ?? $model->foto;
            } else {
                $model->foto = $oldImage;
            }

            if ($model->save()) {
                if (isset($img)) {
                    file_exists('@app/web/foto-seminar/' . $foto_lama) ? unlink(Url::to('@app/web/foto-seminar/' . $foto_lama)) : null;
                    $img->saveAs('@app/web/foto-seminar/' . $model->foto);
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
     * Deletes an existing Pembicara model.
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
     * Finds the Pembicara model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembicara the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembicara::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
