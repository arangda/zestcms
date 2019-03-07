<?php
/**
 * Created by arangda.
 * Date: 2019/3/2
 * Time: 9:31
 */

namespace app\front\module;
use Zest\core\InterceptorInterface;
class LoginIntercepter implements InterceptorInterface
{
    public function postHandle()
    {
        return true;
    }

    public function preHandle()
    {
        echo "Login....";
    }

}