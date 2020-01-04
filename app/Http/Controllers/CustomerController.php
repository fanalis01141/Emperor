<?php

namespace App\Http\Controllers;

use App\Assistant;
use App\Customer;
use App\Room;
use App\RoomType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
        if($request->roomid == null || $request->roomid == "" || $request->check_in_hours == null ){
            return back()->withErrors('Oops, no room and check-in time has been selected.');
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
            'status' => 'IN',
            'encoded_by' => Auth::user()->name
        ]);
            
        Room::where('id', $request->roomid)->update([
            'avail' => 'NO'
        ]);

        session([
            'assistant' => $request->assistant,
            'roomz' => $request->roomz,
            'final_amt' => $final_amt,
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
        return $request;
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

    public function edits(Request $request){
        // return $request;
        $customer = Customer::where('id', $request->id)->first();
        $new_checkin_hrs = $customer->check_in_hrs + $request->hours;
        
        $minutes_to_add = $request->hours * 60;
        
        //get the timeout of customer and add extend
        $carbon_date = Carbon::parse($customer->time_out);
        $string_time = $carbon_date->addMinutes($minutes_to_add);
        $updated_timeout = ($string_time->format("d F Y H:i:s"));

        $new_foam = 50 * $request->foam;
        $new_pax =  50 * $request->pax;
        $new_blanket = 20 * $request->blanket;
        $new_towel = 10* $request->towel;
        $extend_cost = $request->hours * 50;
        $added_costs = $new_foam + $new_pax + $new_towel + $new_blanket + $extend_cost;
        $updated_total = $customer->total + $added_costs;


        //return values
        $data = array();
        $data['foam'] = $request->foam > 0 ? $request->foam : 0;
        $data['blanket'] = $request->blanket > 0 ? $request->blanket : 0;
        $data['pax'] = $request->pax > 0 ? $request->pax : 0;
        $data['towel'] = $request->towel > 0 ? $request->towel : 0;
        $data['added_costs'] = $added_costs;
        $data['hours'] = $request->hours;


        Customer::where('id', $request->id)->update([
            'check_in_hrs' => $new_checkin_hrs,
            'time_out' => $updated_timeout,
            'foam' => $request->foam,
            'pax' => $request->pax,
            'towel' => $request->towel,
            'blanket' => $request->blanket,
            'total' => $updated_total
        ]);

    
        session([
            'hours' => $request->hours,
            'foam' => $request->foam,
            'pax' => $request->pax,
            'towel' => $request->towel,
            'blanket' => $request->blanket,
            'total' => $updated_total,
            'added_costs' => $added_costs,
        ]);

        return redirect()->route('customer.extend');
    }

    public function checkout(Request $request){
        Customer::where('id', $request->id_checkout)->update([
            'status' => 'OUT'
        ]);

        Room::where('room_num',$request->room_checkout)->update([
            'avail' => 'YES'
        ]);

        $customer = Customer::where('id',$request->id_checkout)->first();

        session([
            'room' =>  $request->room_checkout,
            'name' => $customer->name,
            'total' => $customer->total,
        ]);

        return redirect()->route('customer.showcheckout');
    }

    public function showSuccess(){
        return view('success');
    }

    public function showExtended(){
        return view('extended');
    }

    public function showCheckout(){
        return view('checkout');
    }

    public function transfer($id){
        $rooms = Room::where('avail','YES')->orderBy('room_num','asc')->get();
        return view('transfer',compact('rooms','id'));
    }

    public function confirmTransfer(Request $request, $id){
        $c = Customer::where('id',$id)->first();
        $oldroom  = $c->room;

        Room::where('room_num', $request->transfer_room)->update([
            'avail' => 'NO',
        ]);

        Room::where('room_num', $oldroom)->update([
            'avail' => 'YES',
        ]);

        Customer::where('id',$id)->update([
            'room' => $request->transfer_room,
        ]);

        return redirect()->back()->with('success','You transferred room of ' . $c->name);
    }
}
