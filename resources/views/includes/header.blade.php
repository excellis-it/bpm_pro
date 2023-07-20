<div class="header position-sticky top-0 w-100">        
    <div id="main-menu">
      <div class="container-fluid">
        <nav class="navigation navbar">
          <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('frontend_assets/img/logo.png') }}" alt=""/></a></div>
          
          <ul class="core-menu">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li>
              <div class="btn-get">
                <a href="{{ route('register') }}" class="btn get-btn">Register</a>
            </div>
            </li>
          </ul>                 
        </nav>
      </div>          
  </div>
</div>