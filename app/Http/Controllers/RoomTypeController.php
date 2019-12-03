<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        RoomType::create([
            'type' => $request->type,
            'amount3' => $request->amount_3,
            'amount12' => $request->amount_12,
            'amount24' => $request->amount_24

        ]);

        return redirect()->back()->with('success', 'You added a new room type.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        return $request;
        RoomType::where('id', $request->id)->update([
            'type' => $request->type,
            'amount' => $request->amount
        ]);

        return redirect()->back()->with('success', 'You edited details of '. $request->type . '.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;
        RoomType::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'You deleted room type: '.$request->type);

    }

    public function editRoomType(Request $request){
        // return $request;

        RoomType::where('id', $request->id)->update([
            'type' => $request->type,
            'amount3' => $request->amount3,
            'amount12' => $request->amount12,
            'amount24' => $request->amount24,

        ]);

        return redirect()->back()->with('success', 'You edited details of '. $request->type . '.');
    }
}
