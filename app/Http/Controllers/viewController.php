<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\home;
class viewController extends Controller
{
    public function view_users(){
        $users = User::all();
        return view('view_users',compact('users'));
    }
    public function view_staff(){
        $employeetable = Employee::all();
        return view('view_staff',compact('employeetable'));
    }
    public function view_visitors(){
        $hometable = home::all();
        return view('view_visitors',compact('hometable'));
    }
}
