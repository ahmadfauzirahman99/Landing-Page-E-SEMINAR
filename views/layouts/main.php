<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\JsAsset;
use yii\bootstrap4\Modal;
use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css');
$this->registerCssFile('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add([
    'chart.js',
    'icheck-bootstrap',
    'pace',
    'popper',
    'overlayScrollbars',
    'sweetalert2',
    'toastr',
    'daterangepicker'
]);
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
JsAsset::register($this)
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;500;700&family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <script>
        const baseUrl = '<?= Yii::$app->homeUrl ?>';
    </script>
    <style>
        #app {
            font-family: 'Inter', sans-serif !important;
            font-weight: 300 !important;
        }

        .table td,
        .table th {
            padding: .45rem !important;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body id="app" class="hold-transition sidebar-mini  layout-fixed text-md layout-navbar-fixed">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?= $this->render('control-sidebar') ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?= $this->render('footer') ?>
    </div>
    <?php

    Modal::begin([
        'id' => 'myModal',
        'size' => Modal::SIZE_LARGE,
        'options' => [
            'tabindex' => false,
            'data-backdrop' => 'static',
        ]
    ]);
    Modal::end();
    ?>
    <?php $this->endBody() ?>
</body>

<script>
    yii.confirm = function(message, okCallback, cancelCallback) {
        Swal.fire({
            title: 'Perhatian!',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                okCallback()
                console.log(okCallback);

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    };

    $('#myModal').on('show.bs.modal', function(event) {
        // event.preventDefault();
        // $('#seminar-tgl_pelaksana').datepicker()
        let button = $(event.relatedTarget)
        let modal = $(this)
        let title = button.data('title')
        let header = `${title}  
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>`
        let href = button.attr('href')
        modal.find('.modal-header').html(header)
        // modal.find('.modal-body').html(bodyLoad)
        $.get(href)
            .done(function(data) {
                modal.find('.modal-body').html(data)
            });
    })
</script>

</html>
<?php $this->endPage() ?>