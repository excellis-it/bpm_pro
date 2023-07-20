@extends('layouts.master')
@section('meta')
@endsection
@section('title')
BPM PRO | HOME
@endsection
@push('styles')
@endpush


@section('content')
<section class="banner_sec">
    <div class="banner-slider">		
        <div class="banner-slider-wrap">	
    <div class="banner-img">
      <img src="{{asset('frontend_assets/img/bpm_banner.jpg')}}" alt="">
    </div>				
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text">
                                <h1>Quality Service At An<br> Affordable Price</h1>  
                            </div>
                            <div class="btn-get">
                                <a href="#" class="btn get-btn">Registration</a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="banner-slider-wrap">
    <div class="banner-img">
      <img src="{{asset('frontend_assets/img/bpm_banner.jpg')}}" alt="">
    </div>				
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text">
                                <h1>Quality Service At An<br> Affordable Price</h1>  
                            </div>
                            <div class="btn-get">
                                <a href="#" class="btn get-btn">Registration</a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="banner-slider-wrap">	
    <div class="banner-img">
      <img src="{{asset('frontend_assets/img/bpm_banner.jpg')}}" alt="">
    </div>			
                <div class="bn-wrap">
        <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="bn-text">
                                <h1>Quality Service At An<br> Affordable Price</h1>  
                            </div>
                            <div class="btn-get">
                                <a href="#" class="btn get-btn">Registration</a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
    </div>		
</section>
<section class="bg_btm mb-5">
  <div class="container">
    <div class="bg_btm_wrap">
      <div class="bg_btm_left_wrap"> 
        <div class="row justify-content-center align-items-center">
          <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="bg_btm_left_box d-flex">
                <div class="bg_btm_left_icon">
                  <img src="{{asset('frontend_assets/img/bg-btm-1.png')}}" alt="">
                </div>
                <div class="bg_btm_left_text">
                  <h2>22+</h2> 
                  <p>Years Old SEO Company</p> 
                </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="bg_btm_left_box d-flex">
              <div class="bg_btm_left_icon">
                <img src="{{asset('frontend_assets/img/bg-btm-2.png')}}" alt="">
              </div>
              <div class="bg_btm_left_text">
                <h2>120+</h2> 
                <p>Strong Team</p> 
              </div>
            </div>
          </div> 
          <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="bg_btm_left_box d-flex">
                <div class="bg_btm_left_icon">
                  <img src="{{asset('frontend_assets/img/bg-btm-3.png')}}" alt="">
                </div>
                <div class="bg_btm_left_text">
                  <h2>ISO</h2> 
                  <p>9001 - 2008 Certified</p> 
                </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="bg_btm_left_box d-flex">
              <div class="bg_btm_left_icon">
                <img src="{{asset('frontend_assets/img/bg-btm-4.png')}}" alt="">
              </div>
              <div class="bg_btm_left_text">
                <h2>420+</h2> 
                <p>Global Clients Served</p> 
              </div>
            </div>
        </div> 
      </div>         
    </div> 
   </div> 
  </div>
</section>
<section class="services" id="serv">
 <div class="container">
  <div class="services_wrap p-50">
     <div class="services-head">
       <h2 class="text-center">Services We Offer</h2>
     </div>
       <div class="serv-slide-wrap">
        <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-1.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Website Design</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div> 
         <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-2.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Social Media</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div>
         <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-3.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Online Research</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div>
         <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-1.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Website Design</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div>
         <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-2.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Social Media</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div>
         <div class="serv-slide-main">
          <div class="serv-slide-1">
            <img src="{{asset('frontend_assets/img/serv-img-3.jpg')}}" alt=""> 
            <div class="serv-slide-text">
              <h3>Online Research</h3> 
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel dictum maecenas aliquam mauris. Sagittis, ac tristique nibh enim quis purus vel sed in. Tortor sagittis diam turpis lorem neque purus. Massa est urna eget mauris. </p>
            </div>
          </div>
         </div>
       </div>
   </div>
 </div>
</section>
 
 <section class="our-approach p-50">
   <div class="container">
     <div class="row justify-content-center align-items-center">
       <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
         <div class="our-approach-text">
          <div class="services-head">
            <h2 class="text-center h-blk mb-3">Our Approach to SEO</h2>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pulvinar aliquet quam magnis arcu ipsum ullamcorper consectetur. Aenean habitant accumsan, nulla placerat quisque. Egestas venenatis tortor sed pharetra tortor pellentesque dictum eget. Nunc, neque ac aliquet dolor. Sem lobortis venenatis, augue vivamus volutpat. </p>
          </div>   
         </div>
       </div>
     </div>
   </div>
 </section>
 
 <section class="faq-sec">
  <div class="container">
   <div class="faq-sec-wrap">
    <div class="row">
     <div class="col-xl-7 col-lg-7 col-md-7 col-12">
      <div class="faq-sec-left">
        <div class="accordion-content">
          <h2>Frequently Asked Queries</h2>
          <p>Let's clear some doubts first.</p>
           <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                1. Lorem Ipsum is simply dummy text of the printing and typesetting industry?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                2. unknown printer took a galley of type and scrambled it to make a type?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                3. It is a long established fact that a reader will be distracted by the readable?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                4.  Lorem Ipsum is simply dummy text of the printing and typesetting industry?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                5. It has survived not only five centuries, but also the leap?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
          <div class="accordion-item">
            <header class="item-header">
              <h4 class="item-question">
                6.  It was popularised in the 1960s with the release of Letraset?
              </h4>
              <div class="item-icon">
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </header>
            <div class="item-content">
              <p class="item-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </div>
        </div>
      </div> 
     </div>
     <div class="col-xl-5 col-lg-5 col-md-5 col-12">
       <div class="faq-sec-img">
         <img src="{{asset('frontend_assets/img/faq-img.png')}}" alt="">
       </div>
      </div>
    </div>
   </div> 
  </div>
 </section>
@endsection