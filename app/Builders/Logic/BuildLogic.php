<?php
namespace App\Builders\Logic;


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
        $str = "";
        dd($this->query);
        // dd("Hello World");
        return $str;
    }
}
