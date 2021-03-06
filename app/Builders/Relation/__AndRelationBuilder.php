<?php
namespace App\Builders\Relation;

use App\Builders\Interfaces\RelationBuilderInterface;
use App\Builders\Logic\BuildLogic;

class  AndRelationBuilder implements RelationBuilderInterface{
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
    private function __buildLogicOrOrRelation($data)
    {
        if(! $this->__isArray($this->query)){
            print_r($this->query);
            $logic = new BuildLogic($this->query, $this->columns);
            return $logic->build();
        }
        $orRelation = new OrRelationBu8ilder($data, $this->columns);
        return $orRelation->build();
    }

    public function build(){
        $start = ' ( '; $end=' ) ';
        $str = [];
        if(! $this->__isArray($this->query)){
            $logic = new BuildLogic($this->query, $this->columns);
            return $logic->build();
        }
        foreach($this->query as $value){
            $str[] = $this->__buildLogicOrOrRelation($value);
        }
        // dd($str);
        return $start. join(" AND ",$str) . $end;
    }
}
