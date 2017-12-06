<?php
use app\models\User;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'tableName' => 'page',
        ],       
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
    ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user','moder','admin'], //здесь прописываем роли
            //зададим куда будут сохраняться наши файлы конфигураций RBAC
            'itemFile' => '@common/components/rbac/items.php',
            'assignmentFile' => '@common/components/rbac/assignments.php',
            'ruleFile' => '@common/components/rbac/rules.php'
        ],
    ],
];
