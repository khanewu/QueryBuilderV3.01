<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        $sql = <<< EOD
        SELECT  COLUMN_NAME,  DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                table_name =
        EOD;
        $sql = $sql .'`'. $table.'`';
        // return DB::select(DB::raw($sql));

        $result =  DB::getSchemaBuilder()->getColumnListing($table);
        $arr = [];
        foreach ($result as  $value) {
            $arr[]['name'] = $value;
            $arr[]['type'] = DB::getSchemaBuilder()->getColumnType($table, $value);
        }
        return $arr;
    }

}
