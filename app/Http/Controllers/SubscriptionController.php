<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegmentRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Repositories\SubscriptionRepository;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct() {

    // }

    public function index(SubscriptionRepository $repo)
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
        return view('pages.createSubscriber');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store( SubscriptionRequest $request, SubscriptionRepository $segment )
    {
        $input = $this->__processSegmentRequest($request);
        $result =  $segment->create($input);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionRepository $segment, $id)
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
    public function update(SegmentRequest $request, SubscriptionRepository $segment, $id)
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
    public function destroy( SubscriptionRepository $segment, $id)
    {
        $rsult = $segment->delete($id);
        return response()->json(['status'=>'Success']);
    }
    public function listUsersBySegments( SubscriptionRepository $segment, $segmentId)
    {
        $result = $segment->getSubscribersBySegmentId($segmentId);
        return response()->json($result);
    }

}
