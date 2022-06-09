<?php

namespace app\controllers;

use app\models\Layanan;
use app\models\Pertanyaan;
use app\models\Seminar;

class MainController extends \yii\web\Controller
{

    public $layout = 'main-dashboard';
    public function actionIndex()
    {
        $layanan = Layanan::find()->orderBy('nama_layanan DESC')->all();

        $pertanyaan = Pertanyaan::find()->orderBy('pertanyaan ASC')->all();


        return $this->render('index', [
            'layanan' => $layanan,
            'pertanyaan' => $pertanyaan,

        ]);
    }

    public function actionLayananKami($slug)
    {
        $seminar = Seminar::find()->all();

        return $this->render('layanan-kami', [
            'seminar' => $seminar
        ]);
    }

    public function actionDetailLayanan($slug)
    {
        return $this->render('detail-layanan');
    }
}
