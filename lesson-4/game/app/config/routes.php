<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'registration' => [
        'controller' => 'main',
        'action' => 'registration',
    ],
    'login' => [
        'controller' => 'main',
        'action' => 'login',
    ],
    'logout' => [
        'controller' => 'main',
        'action' => 'logout',
    ],
    'game' => [
        'controller' => 'game',
        'action' => 'index',
        'middleware' => 'Auth'
    ],
    'result' => [
        'controller' => 'game',
        'action' => 'result',
        'middleware' => 'Auth'
    ],

];

