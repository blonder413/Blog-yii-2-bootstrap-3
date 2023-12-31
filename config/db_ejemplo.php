<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',

    'on afterOpen' => function($event) {
        // $event->sender se refiere a la conexión DB
        if ($event->sender->driverName == 'mysql') {
            $event->sender->createCommand("SET time_zone = '-5:00'")->execute();
        } elseif ($event->sender->driverName == 'pgsql') {
            $event->sender->createCommand("SET timezone = 'America/Bogota'")->execute();
        }
    }
];
