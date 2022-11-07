<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name  ?? ''}}-{{Auth::user()->lastname  ?? ''}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            
              <p class="text-primary">
                USER MANAGEMENT
                
              </p>
            
          </li>
          <!--Admin Management Page -->
          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->role=='normal_user')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_users')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            
              <p class="text-primary">
                DEPARTMENT MANAGEMENT
                
              </p>
            
          </li>
          <!--Admin Management Page -->
          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Dept.Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('department.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('department.index')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Department</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            
              <p class="text-primary">
                STAFF MANAGEMENT
              </p>
            
          </li>
          
          <!--Admin Management Page -->
          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employee.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->role=='normal_user')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_staff')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Staff</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            
              <p class="text-primary">
                VISITORS MANAGEMENT
              </p>
           
          </li>
          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Visitors Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--Admin Management Page -->
          
              <li class="nav-item">
                <a href="{{route('home.create')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Visitor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('home.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon"></i>
                  <p>View Visitors</p>
                </a>
              </li>
</ul>
              @endif
              @if(Auth::user()->role=='normal_user')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Visitors Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('home.create')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Visitor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view_visitors')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Visitors</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
            <li class="nav-item">
               <a href="{{route('user.logout')}}" class="nav-link">
                 <i class="nav-icon fas fa-th"></i>
                 <p class="text-danger">
                   Logout
                   <span class="right badge badge-danger"></span>
                 </p>
               </a>
      </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>