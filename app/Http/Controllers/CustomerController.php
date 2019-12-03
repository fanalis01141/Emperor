<?php

namespace App\Http\Controllers;

use App\Assistant;
use App\Customer;
use App\Room;
use App\RoomType;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;



class CustomerController extends Controller
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
        $rooms = DB::table('rooms')
                ->orderBy('room_num', 'asc')
                ->get();        
        $assists = DB::table('assistants')
                ->orderBy('name', 'asc')
                ->get();

        return view('new_customer', compact('rooms','assists'));
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
        if($request->roomid == null || $request->roomid == ""){
            return back()->withErrors('Oops, no room has been selected.');
        }

        $date=  Carbon::now('Asia/Manila');
        $time_now = ($date->format("H:i"));
        $date_time_now = ($date->format("Y-m-d H:i:s"));
        
        // Convert hours to minutes
        $minutes_to_add = $request->check_in_hours * 60;

        //Get time out
        $carbon_date = Carbon::parse($date_time_now);
        $string_time = $carbon_date->addMinutes($minutes_to_add);
        $timeout = $string_time->toTimeString();
        $final_time_out = ($string_time->format("d F Y H:i:s"));
        // return $final_time_out;


        // Calculate for amount per extras
        $amount_foam = 50 * $request->foam;
        $amount_towel = 10 * $request->towel;
        $amount_pax =  50 * $request->pax;
        $amount_blanket = 20 * $request->blanket; 
        $final_amt = $amount_foam + $amount_towel + $amount_pax + $amount_blanket + $request->amount;
        
        
        $room = Room::where('id', $request->roomid)->first();
        Customer::create([
            'room' => $request->roomz,
            'room_num' => $request->roomz,
            'time_in' => $time_now,
            'time_out' => $final_time_out,
            'name' => $request->name,
            'check_in_hrs' => $request->check_in_hours,
            'time_left' => $request->check_in_hours . ":00",
            'time_added' => 0,
            'room_type' => $room->desc,
            'assistant' => $request->assistant,
            'foam' => $request->foam,
            'towel' => $request->towel,
            'pax' => $request->pax,
            'blanket' => $request->blanket,
            'total' => $final_amt,
            'status' => 'IN'
        ]);

        Room::where('id', $request->roomid)->update([
            'avail' => 'NO'
        ]);

        return redirect()->route('customer.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function showSuccess(){
        return view('success');
    }
}
