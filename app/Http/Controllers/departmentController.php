<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\department;
class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmenttable = department::all();
        return view('department.index',compact('departmenttable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
        $department = new department();
        $employee->save();
        session::flash('message','Department name created sucessfully');
        return redirect()->route('department.index');
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
            'name'=>'required|min:2|max:50|unique:departments'
        ]);
        $department = new department();
        $department->name = $request->name;
        $department->save();
        session::flash('message','Department name created sucessfully');
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
       $editdepartment = department::findorFail($id);
       return view('department.edit',compact('editdepartment'));
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
            'name'=>'required|min:2|max:50|unique:departments,name,'. $id
        ]);
        $department= department::find($id);
        $department->name = $request->name;
        $department->save();
        return redirect()->route('department.index')->with('message','Department name updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedepartment = department::find($id);
        $deletedepartment->delete();
        return redirect()->route('department.index')->with('message','Department name deleted sucessfully!');
    }
   
}
