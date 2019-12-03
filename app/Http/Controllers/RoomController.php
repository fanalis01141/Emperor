<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
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
        $room = RoomType::where('id', $request->description)->first();
        Room::create([
            'room_num' => strtoupper($request->name),
            'desc' => $room->type,
            'amount3' => $request->amount3_ajax,
            'amount12' => $request->amount12_ajax,
            'amount24' => $request->amount24_ajax,
            'avail' => 'YES'
        ]);
        return redirect()->back()->with('success', 'You added room # '. $request->name.'.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    }

    public function editRoom(Request $request){
        // return $request;
        $room = RoomType::where('id', $request->new_description)->first();

        Room::where('id', $request->id)->update([
            'room_num' => strtoupper($request->number),
            'desc' => $room->type,
            'amount3' => $request->new_amount3_ajax,
            'amount12' => $request->new_amount12_ajax,
            'amount24' => $request->new_amount24_ajax,
        ]);
        return redirect()->back()->with('success', 'You edited details of '. $request->type . '.');
    }

    public function deleteRoom(Request $request)
    {
        Room::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'You deleted room record.');

    }
}
