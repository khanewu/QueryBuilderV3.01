<?php
namespace App\Builders\Relation;

use App\Builders\Interfaces\RelationBuilderInterface;
use App\Builders\Logic\BuildLogic;

class  OrRelationBu8ilder implements RelationBuilderInterface{
    private $query = [];
    private $string = "";
    public function __construct($queryArray)
    {
        $this->query= $queryArray;
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
    private function __buildLogicOrOrRelation($data)
    {
        if(! $this->__isArray($this->query)){
            $logic = new BuildLogic($this->query);
            return $logic->build();
        }
        $orRelation = new OrRelationBu8ilder($data);
        return $orRelation->build();
    }

    public function build(){
        $start = ' ( '; $end=' ) ';
        $str = [];
        if(! $this->__isArray($this->query)){
            $logic = new BuildLogic($this->query);
            return $logic->build();
        }
        foreach($this->query as $value){
            $str[] = $this->__buildLogicOrOrRelation($value);
        }
        $str = $start. join(" OR ",$str) . $end;
        return $str;
    }
}
