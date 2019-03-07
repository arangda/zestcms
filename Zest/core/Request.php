<?php
/**
 * Created by arangda.
 * Date: 2019/3/2
 * Time: 8:55
 */

namespace Zest\core;


class Request
{
    /**
     * 获取指定参数的值
     *
     */
    public function getParam($param)
    {
        if(isset($_REQUEST[$param])){
            return $_REQUEST[$param];    //这里可以做一些安全处理,参考ci
        }else{
            return null;
        }

    }

    /**
     * 获取指定参数的值，并转为数值
     */

    public function getInt($param)
    {
        return intval($this->getParam($param));
    }
}