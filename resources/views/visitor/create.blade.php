@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Visitor's Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Visitor's Data</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
 
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Visitor</h5>

              </div>
            </div><!-- /.card -->
            <form role="form" action="{{route('submitmailnotify')}}" method="POST">
              @csrf
              @if ($errors->any())
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">x</button>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								@if(session('message'))
									<div class="alert alert-success" role="alert">
									  {{session('message')}}
									</div>
								@endif 
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Firstname <span class="text-danger">*</span></label>
                          <input name="name" type="text" class="form-control"  placeholder="Enter your Firstname">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lastname <span class="text-danger">*</span></label>
                          <input name="lastname" type="text" class="form-control"  placeholder="Enter your Lastname">
                        </div>
                        <div class="form-floating mb-3 mb-md-0">
                          <div class="col-md-6" style="padding-top: 10px;">
                          <label for="exampleInputEmail1"><span class="text-danger">*</span>Whom to see </label><br>
                          <select class="custom-select" name="employeeid">
                            <option selected>Select Staff</option>
                            @foreach(App\Models\Employee::all() as $key => $staff)
                            <option value="{{$staff->id}}">{{$staff->name}}</option>
                            @endforeach
                          </select>
                          </div>  
                        </div>
                        <br>                             
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone Number<span class="text-danger">*</span></label>
                          <input name="phone_number" type="number" class="form-control"  placeholder="Enter Phone Number">
                        </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                          <label for="exampleInputEmail1">Contact Person Email <span class="text-danger">*</span></label>
                          <input name="contact_email" type="email" class="form-control"  placeholder="Enter Contact Person Email Address">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Reason for Visit <span class="text-danger">*</span></label>
                          <input name="reason_for_visit" type="text" class="form-control"  placeholder="Enter Reason for visit">
                        </div>
                          
                        <div class="form-group">
                          <label for="exampleInputEmail1">Visitor's Address<span class="text-danger">*</span></label>
                          <input name="address" type="text" class="form-control"  placeholder="Enter the visitor address">
                        </div><br>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Time In<span class="text-danger">*</span></label><br>
                          <input type="datetime-local"  id="appt" name="visitor_enter_time" min="08:00" max="17:30" required><br>
                          <small>Office hours is from 8am to 5:30pm</small>
                        </div>
                  
                      </div>
                    </div>
                  
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Create</button>
                </div>
              </form>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
           

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    

@endsection