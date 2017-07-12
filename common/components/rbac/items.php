<?php
return [
    'dashboard' => [
        'type' => 2,
        'description' => 'Админ панель',
    ],
    'login' => [
        'type' => 2,
        'description' => 'Login',
    ],
    'user' => [
        'type' => 1,
        'description' => 'Пользователь',
        'ruleName' => 'userRole',
    ],
    'moder' => [
        'type' => 1,
        'description' => 'Модератор',
        'ruleName' => 'userRole',
        'children' => [
            'user',
            'login',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userRole',
        'children' => [
            'moder',
        ],
    ],
];
