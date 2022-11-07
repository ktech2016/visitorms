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
            <form role="form" action="{{route('user.store')}}" method="POST">
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Firstname <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control"  placeholder="Enter your Firstname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lastname <span class="text-danger">*</span></label>
                    <input name="lastname" type="text" class="form-control"  placeholder="Enter your Lastname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                    <input name="email" type="text" class="form-control"  placeholder="Enter  Email">
                  </div>
        
                  <div class="form-floating mb-3 mb-md-0">
                    <div class="col-md-6" style="padding-top: 10px;">
                    <label for="exampleInputEmail1">Role <span class="text-danger">*</span></label><br>
                      <select class="form-select" name="role" aria-label="Default select example">
                          <option selected>Select User Role</option>
                          <option value="admin">Admin</option>
                          <option value="normal_user">Normal User</option>
                      </select>
                    </div>  
                  </div>
                   <br>                             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password <span class="text-danger">*</span></label>
                    <input name="password" type="password" class="form-control"  placeholder="Enter  Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password <span class="text-danger">*</span></label>
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