<?php

namespace App\Repositories;

//use Your Model

use App\Builders\QueryBuilder;
use App\Segment;
use App\Subscription;
use Illuminate\Support\Facades\DB;

/**
 * Class SegmentRepository.
 */
class SubscriptionRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function create($inputArray)
    {
        extract($inputArray);
            // dd($query);
            $segment = new Segment();
            $segment->first_name = $first_name;
            $segment->last_name = $last_name;
            $segment->email = $email;
            $segment->birth_day = $birth_day;
            $segment->save();
            return $segment;

        //return YourModel::class;
    }
    public function update($inputArray, $segmentId)
    {
        $segment = Subscription::find($segmentId);
        if(!isset($segment->id)){
            return false;
        }
        extract($inputArray);
        if( isset($first_name) && !empty($first_name)){
            $segment->name = $segment_name;
        }
        if( isset($last_name) && !empty($last_name)){
            $segment->last_name = $last_name;
        }
        if( isset($birth_day) && !empty($birth_day)){
            $segment->birth_day = $birth_day;
        }
        $segment->save();
        return $segment;
    }
    public function getById($id)
    {
        return Subscription::find($id);
    }
    public function getByName($name, $take = 10)
    {
        $name = '%'.$name.'%';
        return Subscription::where('name', 'like', $name)
                ->orWhere('name', 'like', $name)
                ->paginate($take);
    }
    public function get($take= 10)
    {
        return Subscription::paginate($take);
    }
    public function delete($id)
    {
        $id = Subscription::find($id)->delete();
        return true;
    }
    public function getSubscribersBySegmentId($id)
    {
        $result = Segment::find($id);
        // dd($result);
        if(isset($result->id)){
            return DB::select(DB::raw($result['query']));
        }
        return [];
    }

}
