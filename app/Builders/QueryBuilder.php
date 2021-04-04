<?php
namespace App\Builders;

use App\Builders\Relation\AndRelationBuilder;

class  QueryBuilder{
    private $query = [];
    private $string = "";
    public function set($queryArray)
    {
        $this->query= $queryArray;
    }

    private function __build(){
        $str ="" ;
        foreach($this->query as $value){
            $andRelation = new AndRelationBuilder($value);
            $str = $str . " ".$andRelation->build();
        }
        return $str;
    }

    public function generate($queryArray){
        $this->set($queryArray);
        return $this->__build();
    }
}
