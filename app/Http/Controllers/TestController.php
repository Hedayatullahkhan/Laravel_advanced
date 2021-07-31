<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
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
        return view('Employee.testData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileNameToStore = 'noImage.png';
        if($request->hasFile('pic')) {
        $fullname = $request->file('pic')->getClientOriginalName();
        $onlyName = Pathinfo($fullname, PATHINFO_FILENAME);
        $extension = $request->file('pic')->extension();
        $fileNameToStore = $onlyName.'_'.time().'.'.$extension;
        }

         $request->file('pic')->storeAs('public/myFolder',$fileNameToStore);
        $request->validate([
           
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'pic' => 'required'
        ]);
        $testData = new Test;
        $testData->first_name = $request->first_name;
        $testData->last_name = $request->last_name;
        $testData->image = $fileNameToStore;
        $testData->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
