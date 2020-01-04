<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::orderBy('created_at','desc')->get();
        $users = User::all();
        return view('admin', compact('income','users'));
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

        request()->validate([
            'password' => 'min:4',
            'email' => 'unique:users'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'priority' => 'LO',
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', $request->name . ' can now access this system.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function showPanel(){
        $income = Income::all()->orderBy('created_at','asc');
        return view('admin', compact('income'));
    }

    public function saveGross(Request $request){

        Income::create([
            'gross' => $request->total,
            'deductions' => $request->amt_ded,
            'net' => $request->net,
            'date' => $request->date_search
        ]);

        $date = Carbon::parse($request->date_search);
        $finalDate = ($date->format("F d, Y"));
        return redirect()->back()->with('success', 'You have saved record for ' . $finalDate);
    }
}
