<?php
namespace App\Builders\Logic;
namespace App\Builders\Logic\TextLogicBuilder;


class  BuildLogic{
    private $query = [];
    private $string = "";
    private $columns = [];
    public function __construct($logic, $columns)
    {
        $this->query= $logic;
        $this->columns= $columns;
    }
    private funciton __fieldType($field){
        if(isset($this->columns))
    }
    public function build(){
        if(stripos($this->query[1],"string")>=0
         || stripos($this->query[1],"text")>=0 ){
             return $this->TextLogicBuilder($this->query);
         }
        if(stripos($this->query[1],"date")>=0){
             return $this->DateLogicBuilder($this->query);
         }
         return ' '.$this->query[0]. " = " ."'".$this->query[2]."'";
    }
}
