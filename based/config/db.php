<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'pgsql:host=localhost;port=5432;dbname=database', // PostgreSQL
    'dsn' => 'mysql:host=d7.home;dbname=krok_cmf', // MySQL, MariaDB
    'username' => 'krok_cmf',
    'password' => 'mysql_cmf',
    'charset' => 'utf8',
    'tablePrefix' => 'cmf_',
    'enableSchemaCache' => YII_DEBUG ? false : true,
    'schemaCacheDuration' => 300, // seconds
];
