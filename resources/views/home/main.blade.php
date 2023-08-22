@extends('layouts.master')
@section('meta')
@endsection
@section('title')
{{ env('APP_NAME') }} | HOME
@endsection
@push('styles')
@endpush


@section('content')
<section class="banner_sec">
    <div class="banner-slider">		
        <div class="banner-slider-wrap">	
    <div class="banner-img">
      <img src="{{ Storage::url($home_content->banner1_image) }}" alt="">
    </div>				
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text text-center">
                                <h1>{{$home_content->banner1_title}}</h1>  
                                <h2>{{$home_content->banner1_subtitle}}</h2>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="btn-get">
                                  @if(Auth::check() && Auth::user()->hasRole('USER'))
                                    <a href="{{ route('invoice.index') }}" class="btn get-btn">Dashboard</a>
                                  @elseif(Auth::check() && Auth::user()->hasRole('ADMIN'))
                                    <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>
                                  @elseif(Auth::check() && Auth::user()->hasRole('MANAGER'))
                                    <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>  
                                  @else
                                    <a href="{{ route('login') }}" class="btn get-btn">Login</a>
                                    <a href="{{ route('register') }}" class="btn get-btn sign-btn">Signup</a>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="banner-slider-wrap">
    <div class="banner-img">
      <img src="{{ Storage::url($home_content->banner2_image) }}" alt="">
    </div>				
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text text-center">
                                <h1>{{$home_content->banner2_title}}</h1>  
                                <h2>{{$home_content->banner2_subtitle}}</h2>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="btn-get">
                              @if(Auth::check() && Auth::user()->hasRole('USER'))
                                <a href="{{ route('invoice.index') }}" class="btn get-btn">Dashboard</a>
                              @elseif(Auth::check() && Auth::user()->hasRole('ADMIN'))
                                <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>
                              @else
                                <a href="{{ route('register') }}" class="btn get-btn">Login</a>
                              @endif
                            </div>
                            <div class="btn-get btn-get-2">
                              @if(Auth::check() && Auth::user()->hasRole('USER'))
                                <a href="{{ route('invoice.index') }}" class="btn get-btn">Dashboard</a>
                              @elseif(Auth::check() && Auth::user()->hasRole('ADMIN'))
                                <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>
                              @else
                                <a href="{{ route('register') }}" class="btn get-btn">Signup</a>
                              @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="banner-slider-wrap">	
    <div class="banner-img">
      <img src="{{ Storage::url($home_content->banner3_image) }}" alt="">
    </div>			
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text text-center">
                                <h1>{{$home_content->banner2_title}}</h1>  
                                <h2>{{$home_content->banner2_subtitle}}</h2>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="btn-get">
                              @if(Auth::check() && Auth::user()->hasRole('USER'))
                                <a href="{{ route('invoice.index') }}" class="btn get-btn">Dashboard</a>
                              @elseif(Auth::check() && Auth::user()->hasRole('ADMIN'))
                                <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>
                              @else
                                <a href="{{ route('register') }}" class="btn get-btn">Login</a>
                              @endif
                            </div>
                            <div class="btn-get btn-get-2">
                              @if(Auth::check() && Auth::user()->hasRole('USER'))
                                <a href="{{ route('invoice.index') }}" class="btn get-btn">Dashboard</a>
                              @elseif(Auth::check() && Auth::user()->hasRole('ADMIN'))
                                <a href="{{ route('user.list') }}" class="btn get-btn">Dashboard</a>
                              @else
                                <a href="{{ route('register') }}" class="btn get-btn">Signup</a>
                              @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>		
</section>

<section class="invoice-sample">
  <div class="container">
    <div class="invoice-sample-wrap">
      <div class="row align-items-center justify-content-center">
       <div class="col-xl-6 col-md-6 col-8">
        <div class="invoice-sample-head">
          <h2>{{$home_content->body_title}}</h2>  
         
      
        <p>{!! $home_content->body_section !!}</p>     
        </div>  
       </div>   
      </div>  
    </div>    
  </div>  
</section>


<section class="invoice-sample sign_up_1_sec">
  <div class="container">
    <div class="invoice-sample-wrap">
      <div class="row align-items-center justify-content-center">
       <div class="col-xl-10 col-md-12">
        <div class="invoice-sample-head">
          <h2>{!!$home_content->footer_section!!}</h2>  
        </div>
       
       </div>   
      </div>  
    </div>    
  </div>  
</section>
@endsection