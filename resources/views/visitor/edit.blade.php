@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Visitor's Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Visitor's Data</li>
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
                <h5 class="card-title">Edit Visitor's Data</h5>

              </div>
            </div><!-- /.card -->
            <form role="form" action="{{route('home.update',$edithome)}}" method="POST">
              @csrf
              @method('PUT')
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input name="name" type="text" class="form-control"  placeholder="Enter Visitor firstname" value="{{$edithome->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input name="lastname" type="text" class="form-control"  placeholder="" value="{{$edithome->lastname}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Whom to See</label>
                    <input name="employeeid" type="text" class="form-control"  placeholder="" value="{{$edithome->employeeid}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input name="address" type="text" class="form-control"  placeholder="" value="{{$edithome->address}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input name="phone_number" type="number" class="form-control"  placeholder="" value="{{$edithome->phone_number}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Reason for Visit</label>
                    <input name="reason_for_visit" type="text" class="form-control"  placeholder="" value="{{$edithome->reason_for_visit}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Time In<span class="text-danger">*</span></label><br>
                    <input type="text" id="appt" name="visitor_enter_time" value="{{$edithome->visitor_enter_time}}"><br>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Time Out<span class="text-danger">*</span></label><br>
                  <input type="datetime-local" id="appt" name="visitor_out_time" min="08:00" max="17:30" required><br>
                  <small>Office hours is from 8am to 5:30pm</small>
                </div>
                </div>
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Update</button>
                  </div>
                  </div>
                </div>
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