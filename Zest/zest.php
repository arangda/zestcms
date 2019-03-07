<?php
/**
 * Created by arangda.
 * Date: 2019/2/24
 * Time: 10:51
 */
//namespace Zest;
use Zest\core\Route;
use Zest\core\Loader;
use Illuminate\Database\Capsule\Manager as Capsule;
use NoahBuscher\Macaw\Macaw;
class zest
{
    private $route;
    public function run()
    {

        //spl_autoload_register(array('Zest\core\Loader','loadLibClass'));//错在哪里？ class 'Zest\core\Loader' not found
        //spl_autoload_register(function($class){
         //   require_once $class.'.php';
       // });
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => 'mysql',
            'host'   => 'localhost',
            'database' => 'zestcms',
            'username' => 'root',
            'password' => '123',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => 'zest_',
        ]);
        $capsule->bootEloquent();

        $this->route();
        $this->dispatch();

    }

    public function route()
    {
        $this->route = new Route();
        $this->route->init();


    }

    public function dispatch()
    {
        /**
         *  类和方法不分区大小写，变量区分
         */

        $controlName = ucfirst($this->route->control).'Controller';
        $actionName = $this->route->action.'Action';
        $group = $this->route->group;
        $className = "app\\{$group}\module\controller\\{$controlName}";

        /**
         * get_class_methods  获取类的公有方法
         */
        $methods = get_class_methods($className);
        if(!in_array($actionName,$methods,true)){
            /**
             * 记住sprintf这个写法
             */
            throw new \Exception(sprintf('方法名%s->%s不存在或非public',$controlName,$actionName));
        }

        /**
         * 下面代码将此类中的route属性赋值给controller中route,这样就不用再controller中再实例化一次route
         */
        $handler = new $className();
        $reflectedClass = new \ReflectionClass('Zest\core\Controller');
        $reflectedProperty = $reflectedClass->getProperty('route');
        $reflectedProperty->setAccessible(true);
        $reflectedProperty->setValue($this->route);
        /**
         * 并不是每个控制器需要params,如何处理，？？？
         */
        $handler->params = $this->route->params;
        /**
         * {}   可以在“aaa{$aaa}aaa”中引用$aaa这个变量
         */
        $handler->{$actionName}();
    }

    public static function exceptionHandler($exception)
    {
        if($exception instanceof \Zest\core\BaseException){
            $exception->getMessage();
        }else{
            $newException = new \Zest\core\BaseException("未知异常",2000,$exception);
            $newException->getMessage();
        }
    }

    public static function errorHandler($errNo,$errStr,$errFile,$errLine)
    {
        $err = '错误级别:'.$errNo.'|错误描述:'.$errStr;
        $err.='|错误所在文件:'.$errFile.'|错误所在行号:'.$errLine."\r\n";
        echo $err;
        file_put_contents(_APP.'log.txt',$err,FILE_APPEND);
    }
}