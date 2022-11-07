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
                <h5 class="card-title">Visitor's Lists</h5><br>
                <a href="{{route('home.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Visitor</a><br><br>
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
                        <th>Visitor's Firstname</th>
                        <th>Visitor's Lastname</th>
                        <th>Whom to see</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Reason for Visit</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($hometable)
                        @foreach($hometable as $key => $hometab)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$hometab->name}}</td>
                                <td>{{$hometab->lastname}}</td>
                                <td>{{$hometab->employeerelationship->name ?? 'code not found'}}</td>
                                <td>{{$hometab->address}}</td>
                                <td>{{$hometab->phone_number}}</td>
                                <td>{{$hometab->reason_for_visit}}</td>
                                <td>{{$hometab->visitor_enter_time}}</td>
                                <td>{{$hometab->visitor_out_time}}</td>
                                <td>
                                    
                                    
                                <a href="{{route('home.edit',$hometab->id)}}" class="btn btn-sm btn-info mb-1" ><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;
                                    @if(Auth::user()->role=='admin')
                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="home-delete-{{$hometab->id}}" ><i class="fa fa-trash"></i> Delete</a>  
                                    <form id="home-delete-{{$hometab->id}}" action="{{route('home.destroy',$hometab->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                    @endif
                                    &nbsp;
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