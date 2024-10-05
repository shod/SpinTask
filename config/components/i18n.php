<?php

return  ['translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation'=>false,
                    'on missingTranslation' => [
                        '\app\components\YandexTranslation','handleMissingTranslation',
                    ],
                ],
         
            ],
    ];
