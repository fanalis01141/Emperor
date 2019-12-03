<?php

namespace App\Http\Controllers;

use App\Assistant;
use Illuminate\Http\Request;

class AssistantController extends Controller
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
        Assistant::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'You added a new assistant.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assistant  $assistant
     * @return \Illuminate\Http\Response
     */
    public function show(Assistant $assistant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assistant  $assistant
     * @return \Illuminate\Http\Response
     */
    public function edit(Assistant $assistant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assistant  $assistant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assistant $assistant)
    {
        Assistant::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'You edited name of '. $request->name.'.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assistant  $assistant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;
        Assistant::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'You deleted record of '. $request->name.'.');

    }

    public function editAssist (Request $request){
        Assistant::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'You edited name of '. $request->name.'.');
    }
}
