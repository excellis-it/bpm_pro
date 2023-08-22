<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="main-menu">
                    @if(Auth::check() && Auth::user()->hasRole('ADMIN'))
                    <a href="#">Admin Dashboard</a>
                    @else
                    <a href="#">Manager Dashboard</a>
                    @endif
                </li>

                <li class="submenu">
                    <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                    <a href="{{ route('user.list') }}" ><i class="la la-users"></i> <span>Manage Users </span></a>     
                </li>
               
                <li class="submenu">
                    <li class="{{ request()->is('admin/managers*') ? 'active' : '' }}">
                    <a href="{{ route('managers.index') }}" ><i class="la la-user"></i> <span>Manage Managers </span></a>     
                </li>
                
                <li class="submenu">
                    <li class="{{ request()->is('admin/home-cms') ? 'active' : '' }}">
                    <a href="{{ route('home.cms') }}" ><i class="la la-reorder"></i> <span>Home Cms</span></a>     
                </li>
                
            </ul> 
        </div>
    </div>
</div>


