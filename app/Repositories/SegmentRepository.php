<?php

namespace App\Repositories;

//use Your Model

use App\Builders\QueryBuilder;
use App\Segment;

/**
 * Class SegmentRepository.
 */
class SegmentRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function create($inputArray)
    {
        extract($inputArray);
        $new= new SchemaRepository($segment_table);
        $columns = $new->get();
        // dd($columns);
        $queryBuilder = new QueryBuilder($columns);
        if($query = $queryBuilder->generate($segment_logic, $columns)){
            $segment = new Segment();
            $segment->name = $segment_name;
            $segment->table = $segment_table;
            $segment->query = $query;
            $segment->requested_segment_logic = $segment_logic;
            return $segment;
        }
        return false;
        //return YourModel::class;
    }
    public function update($inputArray, $segmentId)
    {
        $segment = Segment::find($segmentId);
        if(!isset($segment->id)){
            return false;
        }
        extract($inputArray);
        if( isset($segment_logic) && !empty($segment_logic)){
            $segment->name = $segment_name;
        }
        if( isset($segment_logic) && is_array($segment_logic)){
            if($query = "QueryBuilderInstance"){
                $segment->query = $query;
                $segment->requested_segment_logic = $segment_logic;
            }
            else{
                return false;
            }
        }
        $segment->save();
        return $segment;
    }
    public function getById($id)
    {
        return Segment::find($id);
    }
    public function getByName($name, $take = 10)
    {
        $name = '%'.$name.'%';
        return Segment::where('name', 'like', $name)->paginate($take);
    }
    public function get($take= 10)
    {
        return Segment::paginate($take);
    }
    public function delete($id)
    {
        $id = Segment::find($id)->delete();
        return true;
    }
}
