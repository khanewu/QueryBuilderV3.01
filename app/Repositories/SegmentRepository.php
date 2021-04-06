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

        $queryBuilder = new QueryBuilder($segment_table);
        // var_dump($columns);
        if($query = $queryBuilder->generate($segment_logic)){

            $query = 'SELECT * FROM '.$segment_table." WHERE ".$query;

            $segment = new Segment();
            $segment->query = $query;
            $segment->name = $segment_name;
            $segment->table = $segment_table;
            $segment->requested_segment_logic = json_encode($segment_logic);
            $segment->save();
            return $segment;
        }
        return false;

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
            $queryBuilder = new QueryBuilder($columns);
            if($query = $queryBuilder->generate($segment_logic, $columns)){
                $query = 'SELECT * FROM '.$segment_table." WHERE ".$query;
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
