<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['debug','log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'v1' => [
            'class' => 'frontend\modules\v1\Module',
        ],
        'blog' => [
            'class' => '****\blog\Module',
            'controllerNamespace' => '****\blog\controllers\frontend'
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'short' => [
            'api' => 'http://api.t.sina.com.cn/short_url/shorten.json',
            'source' => '3271760578'//通过sina申请获得key
        ]
    ],
    'params' => $params,
];
