<?php

use kartik\grid\DataColumn;
use yii\grid\DataColumn as GridDataColumn;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$dbCms = require __DIR__ . '/dbCms.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'id-ID',
    'timeZone' => 'Asia/Jakarta',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'formatter' => [
            'dateFormat' => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'IDR',
            'numberFormatterSymbols' => [
                // \NumberFormatter::CURRENCY_SYMBOL => ''
            ],
            'numberFormatterOptions' => [
                // NumberFormatter::MIN_FRACTION_DIGITS => 0,
                // NumberFormatter::MAX_FRACTION_DIGITS => 2,
            ],
            'defaultTimeZone' => 'Asia/Jakarta',
            'nullDisplay' => '',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'uin-psiko',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'dbCms' => $dbCms,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //            'suffix' => '.html',
            'rules' => [
                '' => 'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',                 // only for integer id
                '<controller:\w+>/<action:\w+[-\w]+\w>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+[-\w]+\w>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>s' => '<controller>/index',
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        // 'admin' => [
        //     'class' => 'app\modules\rbac\Module',
        // ],
        // 'api' => [
        //     'class' => 'app\modules\api\Module',
        // ],
        // 'redactor' => 'yii\redactor\RedactorModule',
    ],
    'container' => [
        'definitions' => [

            yii\grid\SerialColumn::class => [
                'headerOptions' => [
                    // 'class' => 'bg-lightblue'
                ]
            ],
            DataColumn::class => [
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'autocomplete' => 'off'
                ],
                'headerOptions' => [
                    // 'class' => 'bg-lightblue'
                ],
                'contentOptions' => [
                    // 'style' => 'white-space: nowrap;',
                    // 'class' => 'action-column',
                    'style' => 'overflow: hidden; text-overflow: ellipsis;',
                ]
            ],
            GridDataColumn::class => [
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'autocomplete' => 'off'
                ],
                'headerOptions' => [
                    // 'class' => 'bg-lightblue'
                ],
                'contentOptions' => [
                    'style' => 'white-space: nowrap;',
                    // 'class' => 'action-column',
                    'style' => 'overflow: hidden; text-overflow: ellipsis;',
                ]
            ],
            // GridDataColumn::class => [
            //     'filterInputOptions' => [
            //         'class' => 'form-control form-control-sm',
            //         'autocomplete' => 'off'
            //     ],

            // ],
            yii\grid\ActionColumn::class => [
                'class' => 'app\components\ActionColumn',
                'headerOptions' => [
                    'class' => 'bg-lightblue'
                ],
                'contentOptions' => [
                    'class' => 'action-column',
                    'style' => 'text-align: center;'
                ],
            ],

            yii\widgets\DetailView::class => [
                'options' => ['class' => 'table table-sm table-striped table-bordered detail-view'],
            ],
            kartik\date\DatePicker::class => [
                'options' => ['placeholder' => 'Pilih...'],
                // 'removeButton' => false,
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ],
            kartik\daterange\DateRangePicker::class => [
                'useWithAddon' => true,
                // 'attribute' => 'sale_date',
                'convertFormat' => true,
                'presetDropdown' => true,
                'options' => [
                    // 'id' => 'transaksipenjualansearch-sale_date-0',
                    'placeholder' => 'Pilih...',
                ],
                'i18n' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'forceTranslation' => true
                ],
                'autoUpdateOnInit' => false,
                'containerTemplate' => '
                        <div class="kv-drp-dropdown">
                            <span class="left-ind">{pickerIcon}</span>
                            <input type="text" readonly class="form-control form-control-sm range-value" value="{value}">
                            <span class="right-ind kv-clear" style="" title="Clear">&times;</span>
                            <span class="right-ind"><b class="caret"></b></span>
                        </div>
                        {input}
                    ',
                'pluginOptions' => [
                    'linkedCalendars' => false,
                    'showDropdowns' => true,
                    'timePicker' => false,
                    'locale' => [
                        // 'format' => 'Y-m-d'
                        'format' => 'd-m-Y'
                    ],
                    'minYear' => (int) date('Y') - 10,
                    'maxYear' => (int) date('Y') + 0,
                ],
            ],
            // kartik\select2\Select2::class => [
            //     'theme' => 'bootstrap',
            //     'size' => 'sm',
            // ],
            kartik\number\NumberControl::class => [
                'maskedInputOptions' => [
                    // 'prefix' => 'Rp ',
                    'groupSeparator' => '.',
                    'radixPoint' => ',',
                    'allowMinus' => false,
                ],
                'displayOptions' => ['class' => 'form-control form-control-sm kv-monospace'],
                'options' => [
                    'type' => 'hidden',
                    'label' => '<label>Saved Value: </label>',
                    'class' => 'kv-saved',
                    'readonly' => true,
                    'tabindex' => 1000
                ],
                'saveInputContainer' => ['class' => 'kv-saved-cont'],
            ],
            app\components\number\KyNumber::class => [
                'maskedInputOptions' => [
                    // 'prefix' => 'Rp ',
                    // 'alias' => 'numeric',
                    'positionCaretOnClick' => 'none',
                    'groupSeparator' => '.',
                    'radixPoint' => ',',
                    'allowMinus' => true,
                    'unmaskAsNumber' => true, // untuk ambil unmasked value sebagai number,
                ],
                'displayOptions' => ['class' => 'form-control form-control-sm', 'autocomplete' => 'off'],
                'options' => [
                    'type' => 'hidden',
                    // 'label' => '<label>Saved Value: </label>',
                    'label' => null,
                    'class' => 'kv-saved',
                    'readonly' => true,
                    'tabindex' => 1000
                ],
                'saveInputContainer' => ['class' => 'kv-saved-cont'],
            ],
            yii\bootstrap4\Modal::class => [
                'headerOptions' => [
                    'class' => 'modal-header bg-purple text-white',
                    'style' => ['color:white']
                ]
                // 'options' => [
                //     // 'data-backdrop' => 'static',
                //     'class' => 'fade effect-slide-in-bottom',
                // ],

            ],

        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}
if (!YII_ENV_TEST) {
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ // here
            'crud' => [ // generator name
                'class' => 'yii\gii\generators\crud\Generator', // generator class
                'templates' => [ // setting for our templates
                    'yii2-adminlte3' => '@vendor/hail812/yii2-adminlte3/src/gii/generators/crud/default' // template name => path to template
                ]
            ]
        ]
    ];
}
return $config;
