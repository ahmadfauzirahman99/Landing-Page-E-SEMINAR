<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use app\models\Kabupaten;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Provinsi;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\web\View;

$this->title = 'Data Pribadi';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #form .form-group {
        margin-bottom: 0.4rem;
    }
</style>
<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'id' => 'form',
    // 'action' => ['/pos/penunjang'],
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4 col-form-label-md',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
    'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => 'off'],
]); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">

            <div class="card card-green">
                <div class="card-header">
                    <p class="card-title">Form Biodata Diri</p>
                </div>
                <div class="card-body">

                    <?= $form->field($biodataPengguna, 'nama_lengkap')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap', 'class' => 'form-control form-control-sm']) ?>
                    <?= $form->field($biodataPengguna, 'u_id')->hiddenInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap', 'value' => $model->u_id, 'class' => 'form-control form-control-sm'])->label(false) ?>

                    <?= $form->field($biodataPengguna, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Induk Keluarga', 'class' => 'form-control form-control-sm']) ?>

                    <?= $form->field($biodataPengguna, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir', 'class' => 'form-control form-control-sm']) ?>
                    <?= $form->field($biodataPengguna, 'tanggal_lahir')->widget(DatePicker::classname(), [
                        'options' => [
                            'placeholder' => 'Tanggal Lahir',
                            'class' => 'form-control form-control-sm',
                        ],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,                            // 'type' => 1,
                        'removeButton' => false,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ],
                        'class' => 'form-control form-control-sm'
                    ]); ?>
                    <?= $form->field($biodataPengguna, 'jenis_kelamin')->dropdownList(['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], ['class' => 'form-control form-control-sm', 'prompt' => 'Pilih Jenis Kelamin']) ?>

                    <?= $form->field($biodataPengguna, 'kewenegaraan')->dropdownList(['WNI' => 'WNI', 'WNA' => 'WNA'], ['class' => 'form-control form-control-sm', 'prompt' => 'Pilih Kewenegaraan']) ?>
                    <?= $form->field($biodataPengguna, 'agama')->dropdownList(['ISLAM' => 'ISLAM', 'KRISTEN' => 'KRISTEN', 'HINDU' => 'HINDU', 'KHATOLIK' => 'KHATOLIK', 'LAINNYA' => 'LAINNYA'], ['class' => 'form-control form-control-sm', 'prompt' => 'Pilih Agama']) ?>
                    <?= $form->field($biodataPengguna, 'alamat')->textarea(['rows' => 2, 'placeholder' => 'Alamat Lengkap']) ?>
                    <?=
                    $form->field($biodataPengguna, 'id_prov')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' => \yii\helpers\ArrayHelper::map(Provinsi::find()->all(), 'id_prov', 'nama'),
                        'options' => ['id' => 'provinsi-id', 'placeholder' => 'Pilih Provinsi ...'],
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['cat1-id'],
                            'url' => Url::to(['/site/kabupaten']),
                            'params' => ['input-type-1', 'input-type-2']
                        ]
                    ]);
                    ?>
                    <?= $form->field($biodataPengguna, 'id_kab')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kabupaten-id', 'placeholder' => 'Pilih Kabupaten ...',],
                        'data' => \yii\helpers\ArrayHelper::map(Kabupaten::find()->where(['id_prov' => $biodataPengguna->id_prov])->all(), 'id_kab', 'nama'),
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['provinsi-id'],
                            'url' => Url::to(['/site/kabupaten']),
                            'loadingText' => 'Loading Kabupaten',
                        ]
                    ]); ?>
                    <?= $form->field($biodataPengguna, 'id_kec')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kecamatan-id', 'placeholder' => 'Pilih Kecamatan ...'],
                        'data' => \yii\helpers\ArrayHelper::map(Kecamatan::find()->where(['id_kab' => $biodataPengguna->id_kab])->all(), 'id_kec', 'nama'),
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['kabupaten-id'],
                            'url' => Url::to(['/site/kecamatan']),
                            'loadingText' => 'Loading Kecamatan',
                        ]
                    ]); ?>
                    <?= $form->field($biodataPengguna, 'id_kel')->widget(DepDrop::classname(), [
                        'options' => ['placeholder' => 'Pilih Kelurahan ...'],
                        'data' => \yii\helpers\ArrayHelper::map(Kelurahan::find()->where(['id_kec' => $biodataPengguna->id_kec])->all(), 'id_kel', 'nama'),
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['kecamatan-id'],
                            'url' => Url::to(['/site/kelurahan']),
                            'loadingText' => 'Loading Kelurahan',
                        ]
                    ]); ?>


                    <?= $form->field($biodataPengguna, 'status')->dropdownList(['Menikah' => 'Menikah', 'Cerai' => 'Cerai', 'Janda' => 'Janda', 'Duda' => 'Duda', 'Belum Menikah' => 'Belum Menikah'], ['class' => 'form-control form-control-sm', 'prompt' => 'Pilih Status']) ?>


                    <div class="form-group mt-3">
                        <?= Html::submitButton('Simpan Biodata Diri <span class="fa fa-save"></span>', ['class' => 'btn btn-outline-success btn-submit btn-block']) ?>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-blue">
                <div class="card-header">
                    <p class="card-title">Foto</p>
                </div>
                <div class="card-body">
                    <?=
                    $form->field($biodataPengguna, 'foto', [
                        'labelOptions' => ['class' => 'col-sm-12 col-form-label-sm'],
                        'template' => '
                                        {label}
                                        <div class="col-sm-12">
                                            {input}
                                            {hint}{error}
                                        </div>
                                    ',
                    ])->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                        ],
                        'pluginOptions' => [
                            'showCaption' => true,
                            'showRemove' => false,
                            'showUpload' => false,
                            'showCancel' => false,
                            'initialPreview' => [
                                $biodataPengguna->foto ? Url::to('@web/profile/' . $biodataPengguna->foto) : null
                            ],
                            'initialPreviewAsData' => true,
                            'initialCaption' => $biodataPengguna->foto,
                            'initialPreviewConfig' => [
                                [
                                    'caption' => $biodataPengguna->foto,
                                    'showRemove' => true,
                                    'url' => Url::to(['site/hapus-foto-diri-ktp']), // server delete action 
                                    'key' => $biodataPengguna->id_data_pribadi,
                                    'extra' => [
                                        'jenis_foto' => 'foto',
                                        'nama_file' => $biodataPengguna->foto
                                    ]
                                ],
                            ],
                            'overwriteInitial' => true,
                            'maxFileSize' => 2800,
                            'deleteUrl' => Url::to(['/site/file-upload']),
                        ]
                    ])
                        ->label(false)
                    ?>
                </div>
            </div>
            <div class="card card-blue">
                <div class="card-header">
                    <p class="card-title">Biodata Pelengkap</p>
                </div>
                <div class="card-body">
                    <?= $form->field($biodataPengguna, 'no_telp')->textInput(['maxlength' => true, 'placeholder' => 'No Telepon', 'class' => 'form-control form-control-sm']) ?>
                    <?= $form->field($biodataPengguna, 'kode_pos')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pos', 'class' => 'form-control form-control-sm']) ?>
                    <?= $form->field($biodataPengguna, 'rt')->textInput(['maxlength' => true, 'placeholder' => 'RT', 'class' => 'form-control form-control-sm']) ?>
                    <?= $form->field($biodataPengguna, 'rw')->textInput(['maxlength' => true, 'placeholder' => 'RW', 'class' => 'form-control form-control-sm']) ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php $this->registerJs($this->render('biodata-diri.js'), View::POS_END) ?>