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
                        <th>Whom to see</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Reason for Visit</th>
                        <th>Created</th>
                        <th>Updated</th>
                      
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
                                <td>{{$hometab->created_at->diffForHumans()}}</td>
                                <td>{{$hometab->updated_at->diffForHumans()}}</td>
                              
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