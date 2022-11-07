<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use App\Models\Employee;
use App\Models\Users;
use App\Models\timeOut;
use App\Mail\visitorsNotificationMail;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\timeOutController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeOutTable = timeOut::all();
        $hometable = home::orderby('created_at', 'DESC')->GET();
        $employeetable = Employee::all();
        return view('visitor.index',compact('hometable','employeetable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.create');
        $home = new home();
        $home->save();
        session::flash('message','Visitor data created sucessfully');
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
            'name'=>'required|min:2|max:50',
            'lastname'=>'required|min:2|max:50',
            'employeeid' => 'required',
            'address'=>'required|min:20|max:100',
            'phone_number'=>'required',
            'reason_for_visit'=>'required',
            'address'=>'required|min:2|max:50',
            'visitor_enter_time'=>'required',
            'visitor_out_time'=>'nullable'
        ]);
        $guest = new home();
        $guest->name = $request->name;
        $guest->lastname = $request->lastname;
        $guest->address = $request->address;
        $guest->employeeid = $request->employeeid;
        $guest->contact_email = $request->contact_email;
        $guest->phone_number = $request->phone_number;
        $guest->reason_for_visit = $request->reason_for_visit;
        $guest->visitor_enter_time = $request->visitor_enter_time;
        $guest->visitor_out_time = $request->visitor_out_time;
        $guest->save();
        $details=[
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'employeeid' => $request->employeeid,
            'contact_email' => $request->contact_email,
            'phone_number' => $request->phone_number,
            'reason_for_visit' => $request->reason_for_visit,
            'visitor_enter_time' => $request->visitor_enter_time,
            'visitor_out_time' => $request->visitor_out_time,
            
        ];
        session::flash('message','Visitor data saved sucessfully');
        return redirect()->route('home.index');
        
    }

    public function sumbmitvisitorsNotificationMail(Request $request){
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'lastname'=>'required|min:2|max:50',
            'employeeid' => 'required',
            'address'=>'required|min:20|max:100',
            'phone_number'=>'required',
            'reason_for_visit'=>'required',
            'address'=>'required|min:2|max:50',
            'visitor_enter_time'=>'required',
            'timeoutid'=>'nullable'
        ]);
        $guest = new home();
        $guest->name = $request->name;
        $guest->lastname = $request->lastname;
        $guest->address = $request->address;
        $guest->employeeid = $request->employeeid;
        $guest->contact_email = $request->contact_email;
        $guest->phone_number = $request->phone_number;
        $guest->reason_for_visit = $request->reason_for_visit;
        $guest->visitor_enter_time = $request->visitor_enter_time;
        $guest->visitor_out_time = $request->visitor_out_time;
        $guest->save();
        $details=[
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'employeeid' => $request->employeeid,
            'contact_email' => $request->contact_email,
            'phone_number' => $request->phone_number,
            'reason_for_visit' => $request->reason_for_visit,
            'visitor_enter_time' => $request->visitor_enter_time,
            'visitor_out_time' => $request->visitor_out_time,
        ];
        Mail::to($details['contact_email'])->send(new visitorsNotificationMail($details));
        session::flash('message','Visitor data saved sucessfully');
        return redirect()->route('home.index');
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
        $edithome = home::findorFail($id);
        return view('visitor.edit',compact('edithome'));
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
            'name'=>'min:2|max:50',
            'lastname'=>'min:2|max:50',
            'address'=>'min:20|max:100',
            'phone_number'=>'min:2|max:50',
            'visitor_out_time'=>'unique:homes',
        ]);
        $guest= home::find($id);
        $guest->name = $request->name;
        $guest->lastname = $request->lastname;
        $guest->address = $request->address;
        $guest->employeeid = $request->employeeid;
        $guest->phone_number = $request->phone_number;
        $guest->reason_for_visit = $request->reason_for_visit;
        $guest->visitor_enter_time = $request->visitor_enter_time;
        $guest->visitor_out_time = $request->visitor_out_time;
        $guest->save();
        session::flash('message','Visitor data updated sucessfully');
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteemployee = home::find($id);
        $deleteemployee->delete();
        return redirect()->route('home.index')->with('message','Visitor data deleted sucessfully!');
    }
}
