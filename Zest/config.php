<?php
/**
 * Created by arangda.
 * Date: 2019/2/24
 * Time: 10:51
 */

return [
    'mode' => 'debug',
    'filter' => true,
    'charSet' => 'utf-8',
    'defaultApp' => 'front',
    'defaultController' => 'index',
    'defaultAction' => 'index',
    'UrlControllerName' => 'c',    //自定义控制器名称，例如:index.php?c=index
    'UrlActionName' => 'a',
    'UrlGroupName' => 'g',
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=zestcms',
        'username' => 'root',
        'password' => '123',
        'param' => array(),
        'prefix' => 'Zest'
    ],
    'smtp' => []
];