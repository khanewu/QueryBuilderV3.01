<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegmentRequest;
use App\Repositories\SegmentRepository;
use App\Segment;

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
        return response()->json($repo->get());
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
        if(isset($request->segment_logic) && ! is_array($request->segment_logic)){
            $result['segment_logic'] = json_decode($request->segment_logic);
        }
        return $result;
    }
    public function store( SegmentRequest $request, SegmentRepository $segment )
    {
        $input = $request->input();
        // $input = $this->__processSegmentRequest($request);

        $result =  $segment->create($input);
        return response()->json($result);
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
        $result = $segment->getById($id);
        return response()->json($result);
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
        $result = $segment->update($input, $id);
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy( SegmentRepository $segment, $id)
    {
        $result = $segment->delete($id);
        return response()->json($result);
    }
}
