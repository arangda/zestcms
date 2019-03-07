<?php
/**
 * Created by arangda.
 * Date: 2019/2/25
 * Time: 16:37
 */
namespace Zest\core;
use library\render\PhpRender;
class Controller
{
    private $db;
    private $view;
    protected static $route;
    protected $request;

    public function __construct()
    {
        $this->view = new PhpRender();
        $this->request = new Request();
    }

    /**
     * @param $key
     * @param $val
     * @return PhpRender
     * 赋值给模板
     */
    protected function assign($key,$val){
        $this->view->assign($key,$val);
        //return $this->view;              //要这个返回值有用？
    }

    public function display($file='')
    {
        /**
        require_once _SYS.'core/Route.php';    //是否这样引入为最佳，因为zest.php已经实例化,(已经在zest中用类的反射，获取route,并给route赋值解决)
        self::$route = new Route();
        self::$route->init();
         */
        $control = self::$route->control;      //self::$route如何引入？？
        $action = self::$route->action;
        $viewFilePath = _ROOT.'app/'.self::$route->group.'/module/view/';
        if(func_num_args() == 0 || $file == null){
            $viewFilePath.=$control.DIRECTORY_SEPARATOR.$action.'.php';
        }else{
            $viewFilePath .= $control.DIRECTORY_SEPARATOR.$file.'.php';
        }
        $this->view->display($viewFilePath);
    }

    /**
     * 调度DB
     */

    public function db($conf=[])
    {
        if($conf == NULL){
            $conf = $GLOBALS['_config']['db'];
        }
        $this->db = DB::getInstance($conf);
        return $this->db;
    }
    /**
     * 获取视图渲染的结果
     * @ param type $file视图名
     */
    public function fetch($file='')
    {
        ob_start();
        ob_implicit_flush(0);   //0,1的不同？
        $this->display($file);
        $contents = ob_get_clean();
        //return $contents;
    }

}