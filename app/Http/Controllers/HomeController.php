<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::all();
        $customers = Customer::where('status','IN')->get();
        return view('home', compact('rooms','customers'));
    }

    public function addCustomer(){
        
    }
}
