<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'pgsql:host=localhost;port=5432;dbname=database', // PostgreSQL
    'dsn' => 'mysql:host=localhost;dbname=krok_cmf', // MySQL, MariaDB
    'username' => 'krok_cmf',
    'password' => 'mysql_cmf',
    'charset' => 'utf8',
    'tablePrefix' => 'cmf_',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 5, // seconds
];
