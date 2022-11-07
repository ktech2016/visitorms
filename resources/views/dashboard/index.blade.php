@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $user->count() }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              @if(Auth::user()->role=='admin')
              <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
              @if(Auth::user()->role=='normal_user')
              <a href="{{route('view_users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $staff->count() }}</h3>

                <p>Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              @if(Auth::user()->role=='admin')
              <a href="{{route('employee.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
              @if(Auth::user()->role=='normal_user')
              <a href="{{route('view_staff')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $visitor->count() }}</h3>

                <p>Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              @if(Auth::user()->role=='admin')
              <a href="{{route('home.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
              @if(Auth::user()->role=='normal_user')
              <a href="{{route('view_visitors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $department->count() }}</h3>

                <p>Department</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              @if(Auth::user()->role=='admin')
              <a href="{{route('department.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
              @if(Auth::user()->role=='normal_user')
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>

        <!-- Small boxes (Stat box) -->
        
        <!-- Small boxes (Stat box) -->
       
          <!-- ./col -->
          

          
          
          <!-- ./col -->
        <!-- /.row -->

        
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection