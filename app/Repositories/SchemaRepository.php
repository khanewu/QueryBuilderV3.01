<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema\Builder;

class SchemaRepository
{
    /**
     * @return string
     *  Return the model
     */
    private $table = "";
    public function __construct($table = "subscribers")
    {
        $this->table= $table;
    }
    public function get()
    {
        $table= $this->table;

        $result =  DB::getSchemaBuilder()->getColumnListing($table);
        // return $result;
        $arr = [];

        foreach ($result as $key=> $value) {
            $arr[$value] = DB::getSchemaBuilder()->getColumnType($table, $value);
        }
        return $arr;
    }

}
