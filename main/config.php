<?php

return [
    'rootPath' => $_SERVER['DOCUMENT_ROOT'] . '/',
    'title' => 'Other_SITE',
    'defaultControllerName' => 'login',

    'components' => [
        /*
         * конфиг базы данных на локальной машине
         */
        'db' => [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'dbase'
        ]
    ]
];