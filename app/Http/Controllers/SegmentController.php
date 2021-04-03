<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegmentRequest;
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

    public function index()
    {
        //
        return "Hello World";
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
    public function store( SegmentRequest $request )
    {
        dd("hello World");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(Segment $segment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    // public function edit(Segment $segment)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Segment $segment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segment $segment)
    {
        //
    }
}
