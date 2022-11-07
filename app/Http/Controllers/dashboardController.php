<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\home;
use App\Models\department;
class dashboardController extends Controller
{
    public function index(){
        $user = User::all();
        $staff = Employee::all();
        $visitor = home::all();
        $department = department::all();
        return view('dashboard.index', compact('user', 'staff', 'visitor', 'department'));
    }

}
