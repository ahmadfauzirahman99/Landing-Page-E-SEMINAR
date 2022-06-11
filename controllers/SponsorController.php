<?php

namespace app\controllers;

use Yii;
use app\models\Sponsor;
use app\models\SponsorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * SponsorController implements the CRUD actions for Sponsor model.
 */
class SponsorController extends Controller
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
     * Lists all Sponsor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SponsorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-sponsor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sponsor model.
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
     * Creates a new Sponsor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sponsor();

        if ($model->load(Yii::$app->request->post())) {
            $microtime = microtime(true);

            $gambar = UploadedFile::getInstance($model, 'gambar');

            if (isset($gambar)) {
                $file_gambar_lama = $model->gambar;
                $model->gambar = rand(1, 5000) . '-gambar-' . $microtime . '.' . $gambar->getExtension() ?? $model->gambar;
            }

            if ($model->save()) {
                if (isset($gambar)) {
                    file_exists('@app/web/gambar-sponsor/' . $file_gambar_lama) ? unlink(Url::to('@app/web/gambar-sponsor/' . $file_gambar_lama)) : null;
                    $gambar->saveAs('@app/web/gambar-sponsor/' . $model->gambar);
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
     * Updates an existing Sponsor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->gambar;

        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'gambar');

            if (isset($img)) {
                $gambar_lama = $model->gambar;
                $model->gambar = rand(1, 5000)  . '_gambar.' . $img->getExtension() ?? $model->gambar;
            } else {
                $model->gambar = $oldImage;
            }

            if ($model->save()) {
                if (isset($img)) {
                    file_exists('@app/web/gambar-sponsor/' . $gambar_lama) ? unlink(Url::to('@app/web/gambar-sponsor/' . $gambar_lama)) : null;
                    $img->saveAs('@app/web/gambar-sponsor/' . $model->gambar);
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
     * Deletes an existing Sponsor model.
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
     * Finds the Sponsor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sponsor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sponsor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
