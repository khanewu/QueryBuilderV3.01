<?php
namespace App\Builders\Logic;


class  DateLogicBuilder{
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
        // on, after, on or before, on or after, between
        // if($op === 'is'){return $this->setIs($field, $op, $value);}
        // if($op === 'on'){return $this->setOn($field, $value);}
        if($op === 'before'){return $this->setBefore($field, $value);}
        if($op === 'after'){return $this->setAfter($field, $value);}
        if($op === 'on or before'){return $this->onOrBefore($field, $value);}
        if($op === 'on or after'){return $this->onOrAfter($field, $value);}
        if($op === 'between'){return $this->setBetween($field, $value);}
        return $this->setOn($field, $value);
    }
    private function setBefore($field, $value){
        $field = " DATE(".$field.") ";
        $op = " > ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function setOn($field, $value){
        $field = " DATE(".$field.") ";
        $op = " = ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function setAfter($field, $value){
        $field = " DATE(".$field.") ";
        $op = " < ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function onOrBefore($field, $value){
        $field = " DATE(".$field.") ";
        $op = " >= ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function onOrAfter($field, $value){
        $field = " DATE(".$field.") ";
        $op = " <= ";
        $value = " '".$value."' ";
        return $field.$op.$value;
    }
    private function setBetween($field, $value){
        $value= explode(',',$value);
        if(count($value)!==2){
            return false;
        }
        $start = $value[0];
        $end = $value[1];
        // $field = " date(".$field.") ";

        $field = " DATE(".$field.") ";
        $op = " BETWEEN ";
        $value = " |'".$start."' AND '".$end."'";
        return $field.$op.$value;

    }
}
