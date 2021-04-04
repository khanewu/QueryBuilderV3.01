<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegmentRequest;
use App\Repositories\SegmentRepository;
use App\Segment;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct() {

    // }

    public function index(SegmentRepository $repo)
    {
        //
        return response()->json($repo->getSegments());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createSegment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function __processSegmentRequest($request){
        $result = $request->input();
        // if(isset($request->segment_name)){
        //     $result['segment_name'] = $request->segment_name;
        // }
        if(isset($request->segment_logic)){
            $result['segment_logic'] = json_decode($request->segment_logic);
        }
        return $result;
    }
    public function store( SegmentRequest $request, SegmentRepository $segment )
    {
        $input = $this->__processSegmentRequest($request);
        $result =  $segment->create($input);
        return $result['query'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(SegmentRepository $segment, $id)
    {
        //
        return $segment->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function update(SegmentRequest $request, SegmentRepository $segment, $id)
    {
        $input = $this->__processSegmentRequest($request);
        return $segment->update($input, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy( SegmentRepository $segment, $id)
    {
        return $segment->delete($id);
    }
}
