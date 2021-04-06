<?php
namespace App\Builders;

use App\Builders\Relation\AndRelationBuilder;
use App\Repositories\SchemaRepository;

class  QueryBuilder{
    private $query = [];
    private $string = "";
    private $columns = [];

    public function __construct($table_name)
    {
        $tableSchema= new SchemaRepository($table_name);
        $this->columns = $tableSchema->get();
    }
    public function set($queryArray)
    {
        $this->query= $queryArray;
    }

    public function generate($queryArray){
        $this->set($queryArray);
        $andRelation = new AndRelationBuilder($this->query , $this->columns);
        return $andRelation->build();
    }
}
