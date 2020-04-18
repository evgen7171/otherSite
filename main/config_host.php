<?php

return [
    'rootPath' => $_SERVER['DOCUMENT_ROOT'] . '/',
    'title' => 'Other_SITE',
    'defaultControllerName' => 'login',

    'components' => [
        /*
         * конфиг базы данных на хостинге
         */
        'db' => [
            'host' => 'localhost',
            'user' => 'id10720167_tup',
            'password' => 'qwe123',
            'database' => 'id10720167_dbase'
        ]
    ]
];