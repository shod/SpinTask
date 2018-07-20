<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=olg',
    'commandClass' => 'app\components\yii\db\Command',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'enableSchemaCache' => FALSE,
    'schemaCacheDuration'=>3600,
    'schemaCache' => 'cache',
];