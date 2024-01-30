<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SCHEDULE</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRto2Wk4cu26_C-0Bmfj9T3DZf3lvPNCV2ubHay8WDA5017ElFECImLUGXlhLTWCdRTDJI&usqp=CAU" class="img-circle elevation-2"
                 alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Bahrudin</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('picket*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Piket
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('schedule.index') }}" class="nav-link {{ Route::is('schedule.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('shift.index') }}" class="nav-link {{ Route::is('shift.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Shift Group</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('employee*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Employee
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('position.index') }}" class="nav-link {{ Route::is('position.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jabatan</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee.index') }}" class="nav-link {{ Route::is('employee.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pekerja</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('privilege*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Privilege
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link {{ Route::is('role.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('permission.index') }}" class="nav-link {{ Route::is('permission.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permission</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" class="nav-link"
                       onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
