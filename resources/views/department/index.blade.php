@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Department Staff</li>
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
                <h5 class="card-title">Department Lists</h5><br>
                <a href="{{route('department.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Department</a><br><br>
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
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($departmenttable)
                        @foreach($departmenttable as $key => $departmenttab)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$departmenttab->name ?? ''}}</td>
                                <td>{{$departmenttab->created_at->diffForHumans()}}</td>
                                <td>{{$departmenttab->updated_at->diffForHumans()}}</td>
                                <td>   
                                    <a href="{{route('department.edit',$departmenttab->id)}}" class="btn btn-sm btn-info" ><i class="fa fa-edit"></i> Edit</a>  
                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="department-delete-{{$departmenttab->id}}" ><i class="fa fa-trash"></i> Delete</a>
                                    <form id="department-delete-{{$departmenttab->id}}" action="{{route('department.destroy',$departmenttab->id)}}" method="post">
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