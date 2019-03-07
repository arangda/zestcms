<?php
/**
 * Created by arangda.
 * Date: 2019/2/25
 * Time: 16:29
 */
namespace library\render;
use Zest\core\Render;

class PhpRender implements Render
{
    private $value = array();
    public function init(){

    }

    /**
     * @param $key
     * @param $value
     * 变量赋值
     */
    public function assign($key, $value)
    {
        $this->value[$key] = $value;
    }

    /**
     * @param string $view
     * 视图显示
     */
    public function display($view = '')
    {
        extract($this->value);
        include $view;
    }


}