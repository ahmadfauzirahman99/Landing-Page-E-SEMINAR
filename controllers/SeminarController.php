<?php

namespace app\controllers;

use Yii;
use app\models\Seminar;
use app\models\SeminarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * SeminarController implements the CRUD actions for Seminar model.
 */
class SeminarController extends Controller
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
     * Lists all Seminar models.
     * @return mixed
     */
    public function actionIndex()
    {


        return $this->render('index-seminar', []);
    }

    /**
     * Displays a single Seminar model.
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
     * Creates a new Seminar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seminar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_seminar]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seminar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $microtime = microtime(true);

            $lampiran = UploadedFile::getInstance($model, 'lampiran');

            if ($lampiran) {
                $file_lampiran_lama = $model->lampiran;
                $model->lampiran = $model->id_seminar . '-lampiran-' . $microtime . '.' . $lampiran->getExtension() ?? $model->lampiran;
            }


            if ($model->save()) {
                if ($lampiran) {
                    file_exists('@app/web/lampiran-seminar/' . $file_lampiran_lama) ? unlink(Url::to('@app/web/lampiran-seminar/' . $file_lampiran_lama)) : null;
                    $lampiran->saveAs('@app/web/lampiran-seminar/' . $model->lampiran);
                }
                return $this->redirect(['view', 'id' => $model->id_seminar]);
            } else {

                // $model->u_id = Yii::$app->user->identity->id;
                return $this->render('update', [
                    'model' => $model,
                ]);
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
     * Deletes an existing Seminar model.
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
     * Finds the Seminar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seminar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seminar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
