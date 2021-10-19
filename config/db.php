<?php

return [
    'class' => \yii\db\Connection::class,
    'dsn' => "mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']}",
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => $_ENV['DB_CHARSET'],
    'driverName' => $_ENV['DB_DRIVER'],
    'on afterOpen' => function ($event) {
        $event->sender->createCommand("SET time_zone='{$_ENV['DB_TIMEZONE']}';")->execute();
    },

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
