<?php
/**
 * Created by arangda.
 * Date: 2019/3/2
 * Time: 9:25
 */

namespace Zest\core;

interface InterceptorInterface{
    /**
     * 前置拦截器，在所有Action运行前会进行拦截
     */
    public function preHandle();

    /**
     * 后置拦截器
     */
    public function postHandle();
}