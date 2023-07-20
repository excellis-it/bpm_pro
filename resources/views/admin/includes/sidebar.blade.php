<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                {{-- <li class="{{ Request::is('admin/dashboard*') ? 'active' : ' ' }}">
                    <a href="{{ route('admin.dashboard') }}" ><i class="la la-dashboard"></i> <span>Dashboard</span></a>                 
                </li> --}}
                
                <li class="menu-title">
                    <span>Profile Section</span>
                </li>

                <li class="submenu">
                    {{-- <a href="#" class="{{ Request::is('admin/profile*') || Request::is('admin/detail*') ? 'active' : ' ' }}"><i class="la la-user-cog"></i> <span>Manage Account </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ Request::is('admin/profile*') ? 'active' : ' ' }}">
                            <a href="{{ route('admin.profile') }}">My Profile</a>
                        </li>
                        
                                           
                    </ul> --}}

                    <a href="#" class="{{ Request::is('admin/users') ? 'active' : '' }}"><i class="la la-users"></i> <span>Manage Users </span> <span
                        class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li class="{{ Request::is('admin/profile*') ? 'active' : ' ' }}">
                                <a href="{{ route('admin.profile') }}">My Profile</a>
                            </li>                   
                        </ul>
                    </li>
                </ul> 
        </div>
    </div>
</div>


