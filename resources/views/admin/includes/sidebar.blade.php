<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="main-menu">
                    <a href="#">Admin Dashboard</a>
                </li>

                <li class="submenu">
                    <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                    <a href="{{ route('user.list') }}" ><i class="la la-users"></i> <span>Manage Users </span></a>     
                    </li>
                </ul> 
        </div>
    </div>
</div>


