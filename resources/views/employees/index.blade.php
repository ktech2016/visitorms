@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Lists Staff</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              
 
            <div class="card card-primary card-outline ">
              <div class="card-body">
                <h5 class="card-title">Staff Lists</h5><br>
                <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Staff</a><br><br>
              </div>
              <example-component></example-component>
            </div><!-- /.card -->
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
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email Address</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($employeetable)
                        @foreach($employeetable as $key => $employeetab)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$employeetab->name ?? ''}}</td>
                                <td>{{$employeetab->departmentrelationship->name ?? 'code not found'}}</td>
                                <td>{{$employeetab->email_address ?? ''}}</td>
                                <td>{{$employeetab->created_at->diffForHumans()}}</td>
                                <td>{{$employeetab->updated_at->diffForHumans()}}</td>
                                <td>   
                                    <a href="{{route('employee.edit',$employeetab->id)}}" class="btn btn-sm btn-info" ><i class="fa fa-edit"></i> Edit</a>  
                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="employee-delete-{{$employeetab->id}}" ><i class="fa fa-trash"></i> Delete</a>
                                    <form id="employee-delete-{{$employeetab->id}}" action="{{route('employee.destroy',$employeetab->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
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