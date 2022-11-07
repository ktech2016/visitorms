@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Lists User</li>
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
                <h5 class="card-title">User Lists</h5><br>
                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add User</a><br><br>
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
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$user->name ?? ''}}</td>
                                <td>{{$user->lastname ?? ''}}</td>
                                <td>{{$user->email ?? ''}} @if (auth()->id() == $user->id) (you) @endif</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                
                                <td>   
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-info" ><i class="fa fa-edit"></i> Edit</a> 
                                    @if(auth()->id() != $user->id) 
                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="user-delete-{{$user->id}}" ><i class="fa fa-trash"></i> Delete</a>
                                    <form id="user-delete-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                </td>
                                @endif
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