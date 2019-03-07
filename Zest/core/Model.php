<?php
/**
 * Created by arangda.
 * Date: 2019/2/26
 * Time: 16:15
 */
namespace Zest\core;
class Model
{
    public function save()
    {
        require_once _SYS.'core/DB.php';
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        //$keyArray = array_column($props,'name');
        $keyArray = array();
        foreach($props as $prop){
            array_push($keyArray,$prop->getName());
        }
        $keys = implode(',',$keyArray);
        $prepareKeys = implode(',',array_map(function($key){
            return ':'.$key;
        },$keyArray));

       $sqlTemplate = "INSERT INTO ".$this->getTableNameByPO($reflect). " ({$keys}) VALUES ($prepareKeys)";
       $data = [];
       foreach ($props as $v){
           $data[$v->name] = $reflect->getProperty($v->name)->getValue($this);
       }

       $db = DB::getInstance($GLOBALS['_config']['db']);
       $ret = $db->execute($sqlTemplate,$data);
       return $ret;

    }

    public function deleteByPid()
    {

    }

    public function update()
    {

    }

    public function find()
    {

    }

    public function buildPrimaryWhere()
    {

    }

    public function getRealTableName($tableName,$prefix='')
    {
        if(!empty($prefix)){
            $realTableName = $prefix."_{$tableName}";
        }elseif (isset($GLOBALS['_config']['db']['prefix']) && !empty($GLOBALS['_config']['db']['prefix'])){
            $realTableName = $GLOBALS['_config']['db']['prefix']."_{$tableName}";
        }else{
            $realTableName = $tableName;
        }
        return $realTableName;
    }

    public function getTableNameByPO($reflect)
    {
        return $this->getRealTableName(strtolower($reflect->getShortName()));
    }




}