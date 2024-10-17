<?php

return [
    'translations' => [
        'app*' => [
            //class' => 'yii\i18n\I18N',
            //'class' => 'app\components\yii\i18n\DbMessageSource',
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages',  // Путь к файлам с переводами
            'sourceLanguage' => 'en-US',     // Язык исходного текста
            'fileMap' => [
                'app' => 'app.php',         // Карта файлов переводов
                'SeoPatternv2' => 'SeoPatternv2.php',         // Карта файлов переводов
                'region' => 'region.php',         // Карта файлов переводов
                'app/error' => 'error.php',
            ],
        ],
        'region*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages', // Путь к файлам с переводами
            'sourceLanguage' => 'en-US',   // Язык оригинала
            'fileMap' => [
                'region' => 'region.php',  // Файл с переводами для категории region
            ],
        ],

        'service*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages', // Путь к файлам с переводами
            'sourceLanguage' => 'en-US',   // Язык оригинала
            'fileMap' => [
                'service' => 'service.php',  // Файл с переводами для категории region
            ],
        ],
    ],
];
