<?php
/**
 * Created by arangda.
 * Date: 2019/2/25
 * Time: 16:27
 */
namespace Zest\core;
interface Render{
    public function init();
    public function assign($key,$value);
    public function display($view='');
}