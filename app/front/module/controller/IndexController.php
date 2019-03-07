<?php
namespace app\front\module\controller;
/**
 * Created by arangda.
 * Date: 2019/2/24
 * Time: 14:58
 */


use Zest\core\Controller;
use app\model\Tmp;


class IndexController extends Controller
{
    public function _before_()
    {
        //...权限判断
    }

    public function indexAction()
    {

echo "aaaa";
        $this->assign('age',30);
        $this->display();



    }

    public function hiAction()
    {

        $this->assign('age',50);
        $this->display();


    }

    public function updateAction()
    {

    }
}