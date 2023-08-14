<div class="main-wrapper">
    <div class="container">
    <div class="header">
        <div class="header-left">
            <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('frontend_assets/img/logo.png') }}" alt=""/></a></div>
            
        </div>
        <!--<a id="toggle_btn" href="javascript:void(0);">-->
        <!--    <span class="bar-icon">-->
        <!--        <span></span>-->
        <!--        <span></span>-->
        <!--        <span></span>-->
        <!--    </span>-->
        <!--</a>-->

        <div class="page-title-box">
            <h3>Welcome to user panel</h3>
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu">
             <li class="nav-item dropdown has-arrow main-drop bdr_1">
                <a href="{{ route('invoice.index') }}" class="nav-link">List of Invoices </a>
            </li>      
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        @if (!Auth::user()->logo)
                        <img src="{{ asset("admin_assets/images/icon.png") }}" alt="">
                        @else
                        <img src="{{ Storage::url(Auth::user()->logo) }}">
                        @endif
                        <span class="status online"></span></span>
                    <span>{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
                <a class="dropdown-item invoice-list-1 d-none d-sm-block d-md-none" href="{{ route('invoice.index') }}">Invoice List</a>
                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                </div>
            </li>
        </ul>

        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ route('invoice.index') }}">Invoice List</a>
                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
            </div>
        </div>
    </div>
   </div>