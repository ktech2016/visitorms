@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
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
                <h5 class="card-title">User Create</h5>

              </div>
            </div><!-- /.card -->
            <form role="form" action="{{route('user.update', $edituser)}}" method="POST">
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
                    <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control"  placeholder="Enter  Username" value="{{$edituser->name ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                    <input name="email" type="text" class="form-control"  placeholder="Enter  Email" value="{{$edituser->email ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password </label>
                    <input name="password" type="password" class="form-control"  placeholder="Enter  Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password </label>
                    <input name="password_confirmation" type="password" class="form-control"  placeholder="Confirm password">
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