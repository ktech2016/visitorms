<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeetable = Employee::orderby('created_at', 'DESC')->GET();
        return view('employees.index',compact('employeetable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
        $employee = new Employee();
        $employee->save();
        session::flash('message','Staff name created sucessfully');
        return redirect()->route('employee.index');
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
            'name'=>'required|min:2|max:50|unique:employees',
            'departmentid' => 'required',
            'email_address' => 'required|unique:employees'
        ]);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->departmentid = $request->departmentid;
        $employee->email_address = $request->email_address;
        $employee->save();
        session::flash('message','Staff name created sucessfully');
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
       $editemployee = Employee::findorFail($id);
       return view('employees.edit',compact('editemployee'));
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
            'name'=>'required|min:2|max:50|unique:employees,name,'. $id,
            'departmentid' => 'required',
            'email_address' => 'required|unique:employees'
        ]);
        $employee= Employee::find($id);
        $employee->name = $request->name;
        $departmentid->name = $request->departmentid;
        $email_address->name = $request->email_address;
        $employee->save();
        return redirect()->route('employee.index')->with('message','Staff name updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteemployee = Employee::find($id);
        $deleteemployee->delete();
        return redirect()->route('employee.index')->with('message','Staff name deleted sucessfully!');
    }
   
}
