<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\home;
use App\Models\timeOut;
class timeOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hometable = home::all();
        $timeOutTable = timeOut::all();
        return view('visitor.index',compact('timeOutTable','hometable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeOut = new timeOut();
        $timeOut->save();
        session::flash('message','Time Out created sucessfully');
        return redirect()->route('home.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'visitor_enter_time'=>'required|unique:time_outs',
            'visitor_out_time'=>'required|unique:time_outs',
            
        ]);
        $time = new timeOut();
        $time->visitor_enter_time = $request->visitor_enter_time;
        $time->visitor_out_time = $request->visitor_out_time;
        $time->save();
        session::flash('message','Visitor Time out set');
        return back();
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
       $editTimeout = timeOut::findorFail($id);
       return view('timeOut.edit',compact('editTimeout'));
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
        $this->validate($request,[
            'visitor_enter_time'=>'required|unique:time_outs,'.$id,
            'visitor_out_time'=>'required|unique:time_outs,'.$id
            
        ]);
        $time= timeOut::find($id);
        $time->visitor_enter_time = $request->visitor_enter_time;
        $time->visitor_out_time = $request->visitor_out_time;
        $time->save();
        return redirect()->route('home.index')->with('message','Time data updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTimeOut = timeOut::find($id);
        $deleteTimeOut->delete();
        return redirect()->route('timeOut.index')->with('message','Time data deleted sucessfully!');
    }
   
}
