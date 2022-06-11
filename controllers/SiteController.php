<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DataPribadi;
use app\models\Kabupaten;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Seminar;
use app\models\Users;
use yii\helpers\Url;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHapusFotoDiriKtp()
    {
        $data = Yii::$app->request->post();

        $modelHapusFotoDiri = Seminar::findOne([
            'id_seminar' => $data['key'],
        ]);

        if (file_exists('lampiran-seminar/' . $data['nama_file'])) {
            unlink(Url::to('@app/web/lampiran-seminar/' . $data['nama_file']));
            $modelHapusFotoDiri->{$data['jenis_foto']} = null;
        }

        return $modelHapusFotoDiri->save();
    }

    public function actionBiodataDiri()
    {
        $model  = Users::findOne(['u_id' => '2']);

        $biodataPengguna = DataPribadi::findOne(['u_id' => 2]);
        if (is_null($biodataPengguna)) {
            $biodataPengguna = new DataPribadi();
            $biodataPengguna->u_id = 2;
            $biodataPengguna->nama_lengkap = strtoupper($model->nama_lengkap);
        }

        $oldImage = $biodataPengguna->foto;
        if (Yii::$app->request->isPost) {
            if ($biodataPengguna->load(Yii::$app->request->post())) {
                $img = UploadedFile::getInstance($biodataPengguna, 'foto');

                if (isset($img)) {
                    $foto_lama = $biodataPengguna->foto;
                    $biodataPengguna->foto = rand(1, 5000)  . '_foto.' . $img->getExtension() ?? $biodataPengguna->foto;
                } else {
                    $biodataPengguna->foto = $oldImage;
                }

                if ($biodataPengguna->save()) {
                    if (isset($img)) {
                        file_exists('@app/web/profile/' . $foto_lama) ? unlink(Url::to('@app/web/profile/' . $foto_lama)) : null;
                        $img->saveAs('@app/web/profile/' . $biodataPengguna->foto);
                    }
                    return $this->writeResponse(true, 'Berhasil Menginput Data');
                } else {
                    return $this->writeResponse(false, 'Tidak Berhasil Menginput Data', $biodataPengguna->errors);
                }
            }
        }

        return $this->render('biodata-diri', [
            'model' => $model,
            'biodataPengguna' => $biodataPengguna,
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


    /// site bbantuan
    public function actionKabupaten()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Kabupaten::find()->andWhere(['id_prov' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id_kab'], 'name' => $account['nama']];
                    if ($i == 0) {
                        $selected = $account['id_kab'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionKecamatan()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Kecamatan::find()->andWhere(['id_kab' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id_kec'], 'name' => $account['nama']];
                    if ($i == 0) {
                        $selected = $account['id_kec'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
    public function actionKelurahan()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Kelurahan::find()->andWhere(['id_kec' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id_kel'], 'name' => $account['nama']];
                    if ($i == 0) {
                        $selected = $account['id_kel'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}
