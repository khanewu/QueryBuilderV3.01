<?php
namespace App\Builders\Logic;
use App\Builders\Logic\TextLogicBuilder;
use App\Builders\Logic\DateLogicBuilder;


class  BuildLogic{
    private $query = [];
    private $string = "";
    private $columns = [];
    public function __construct($logic, $columns)
    {
        $this->query= $logic;
        $this->columns= $columns;
    }
    public function build(){
        // dd($this->columns);
        if(count($this->query)!==3){
            return false;
        }
        $field= $this->query[0];
        if(! isset($this->columns[$field])){
            return false;
        }
        $type = $this->columns[$field];

        if(stripos($type,"string")!==false || stripos($type,"text")!==false){
            $text= new TextLogicBuilder($this->query, $this->columns);
            return $text->buildLogic();
        }
        if(stripos($type,"date")!==false){
            // dd($this->columns);
            $date = new DateLogicBuilder($this->query, $this->columns);
            return  $date->buildLogic();
        }
        return ' '.$this->query[0]. " = " ."'".$this->query[2]."'";
    }
}
