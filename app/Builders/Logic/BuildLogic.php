<?php
namespace App\Builders\Logic;


class  BuildLogic{
    private $query = [];
    private $string = "";
    public function __construct($logic)
    {
        $this->query= $logic;
    }
    public function set($logic)
    {
        $this->query= $logic;
    }
    private function __isArray($data)
    {
        if(is_array($data) && is_array($data[0])){
            return true;
        }
        return false;
    }
    public function build(){
        $str = "";
        dd($this->query);
        // dd("Hello World");
        return $str;
    }
}
