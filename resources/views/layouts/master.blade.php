<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('layouts.partials._head')
</head>
<body class="hold-transition sidebar-mini">

@include('layouts.partials._navbar')

  @include('layouts.partials._sidebar')



<div class="container-wrapper" id="app">
    @yield('content')
</div>




    <!-- /.content-header -->

    <!-- Main content -->
  
    <!-- /.content -->
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
@include('layouts.partials._footer')
  <!-- Main Footer -->
 
<!-- ./wrapper -->
@include('layouts.partials._footer-script')

</body>
</html>
