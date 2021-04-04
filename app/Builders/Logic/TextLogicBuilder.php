<?php
namespace App\Builders\Logic;


class  TextLogicBuilder{
    private $query = [];
    private $string = "";
    private $columns = [];
    public function __construct($logic, $columns)
    {
        $this->query= $logic;
        $this->columns= $columns;
    }
    public function buildLogic()
    {
        $field = $this->query[0]; $op = $this->query[1]; $value = $this->query[2];

        if($op === 'is_not'){return $this->setIsNot($field, $value);}
        if($op === 'starts_with'){return $this->setStartsWith($field, $value);}
        if($op === 'ends_with'){return $this->setEndsWith($field, $value);}
        if($op === 'contains'){return $this->setContains($field, $value);}
        if($op === 'doesnot_starts_with'){return $this->setDoesnotStartsWith($field, $value);}
        if($op === 'doesnot_end_with'){return $this->setDoesnotEndWith($field, $value);}
        if($op === 'doesnot_contains'){return $this->doesnotContains($field, $value);}
        return $this->setIs($field, $value);
    }
    private function setIs($field, $value){
        $field = " ".$field." ";
        $op = " = ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function setIsNot($field, $value){

        $field = " ".$field." ";
        $op = " != ";
        $value = " '".$value."' ";
        return $field.$op.$value;

    }
    private function setStartsWith($field, $value){
        $field = " ".$field." ";
        $op = " LIKE ";
        $value = " '".$value."%' ";
        return $field.$op.$value;

    }
    private function setEndsWith($field, $value){
        $field = " ".$field." ";
        $op = " LIKE ";
        $value = " '%".$value."' ";
        return $field.$op.$value;
    }
    private function setContains($field, $value){
        $field = " ".$field." ";
        $op = " LIKE ";
        $value = " '%".$value."%' ";
        return $field.$op.$value;
    }
    private function setDoesnotStartsWith($field, $value){
        $field = " ".$field." ";
        $op = " NOT LIKE ";
        $value = " '".$value."%' ";
        return $field.$op.$value;

    }
    private function setDoesnotEndWith($field, $value){
        $field = " ".$field." ";
        $op = " NOT LIKE ";
        $value = " '%".$value."' ";
        return $field.$op.$value;

    }
    private function doesnotContains($field, $value){
        $field = " ".$field." ";
        $op = " NOT LIKE ";
        $value = " '%".$value."%' ";
        return $field.$op.$value;
    }
}
