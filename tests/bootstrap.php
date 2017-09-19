<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

new \yii\console\Application([
    'id' => 'unit',
    'basePath' => __DIR__,
    'vendorPath' => __DIR__ . '/../vendor',
    'aliases' => [
        '@tests' => __DIR__ ,
        '@bower' => '@vendor/bower-asset',
    ],
    'components' => [
        'assetManager' => [
            'class' => 'tests\AssetManager',
            'basePath' => '@tests/assets',
            'baseUrl' => '/',
        ],
    ],
]);
