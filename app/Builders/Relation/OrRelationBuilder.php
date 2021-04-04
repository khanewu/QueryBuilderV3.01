<?php
namespace App\Builders\Relation;

use App\Builders\Interfaces\RelationBuilderInterface;
use App\Builders\Logic\BuildLogic;
use App\Builders\Relation\AndRelationBuilder;

class  OrRelationBuilder implements RelationBuilderInterface{
    private $query = [];
    private $string = "";
    private $columns = [];
    public function __construct($queryArray, $columns)
    {
        $this->query= $queryArray;
        $this->columns= $columns;
    }
    public function set($queryArray)
    {
        $this->query= $queryArray;
    }
    private function __isArray($data)
    {
        if(is_array($data) && is_array($data[0])){
            return true;
        }
        return false;
    }
    private function __buildLogic($data){
        if(! $this->__isArray($data)){
            $logic = new BuildLogic($data , $this->columns);
            return $logic->build();
        }
        return false;
    }
    private function __buildLogicOrOrRelation($data)
    {
        if($result = $this->__buildLogic($data)){
            return $result;
        }
        $orRelation = new AndRelationBuilder($data, $this->columns);
        return $orRelation->build();
    }

    public function build(){
        $start = ' ( '; $end=' ) ';
        $str = [];

        if($result = $this->__buildLogic($this->query)){
            return $result;
        }
        foreach($this->query as $value){
            $str[] = $this->__buildLogicOrOrRelation($value);
        }
        $str = $start. join(" OR ",$str) . $end;
        return $str;
    }
}
