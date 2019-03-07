<?php
/**
 * Created by arangda.
 * Date: 2019/2/24
 * Time: 10:48
 * |--app  不同的应用分组
 * |--library 第三方类库和工具类等
 * |--Zest 框架核心文件目录
 * |  |--config.php 框架核心配置文件
 * |  |--zest.php 框架bootstrap
 * |  |--core 存放框架核心类
 * |--plugin 存放插件的目录
 */

define('_ROOT',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('_SYS',_ROOT.'Zest'.DIRECTORY_SEPARATOR);
define('_APP',_ROOT.'app'.DIRECTORY_SEPARATOR);
define('_VERSION','0.1');

$GLOBALS['_config'] = require_once _SYS.'config.php';

/**
 * 下面代码怎么没用呢？
 */
if('debug' == $GLOBALS['_config']['mode']){

}else{
    set_error_handler(['zest','errorHandler']);
}
set_exception_handler(['zest','exceptionHandler']);

//Autoload自动载入
require _ROOT.'vendor/autoload.php';
require _SYS.'zest.php';    //首页这里是必须要require了哦？
$app = new zest;    //在zest.php中写了namespace后 这里不能use,
$app->run();