<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="main-menu">
                    <a href="#">User Dashboard</a>
                </li>

                <li class="submenu">
                    <li class="{{ request()->is('user/invoice*') ? 'active' : '' }}">
                    <a href="{{ route('invoice.index') }}" ><i class="la la-file"></i> <span>Invoice</span></a>     
                    </li>
                </ul> 
        </div>
    </div>
</div>


