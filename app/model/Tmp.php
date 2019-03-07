<?php
/**
 * Created by arangda.
 * Date: 2019/2/26
 * Time: 16:43
 */
namespace app\model;
use Zest\core\Model;

class Tmp extends \Illuminate\Database\Eloquent\Model
{
   // public $id;
    //public $name;
    protected $table = 'tmp';

    /**
     * 该模型是否被自动维护时间戳
     */
    public $timestamps = false;
}