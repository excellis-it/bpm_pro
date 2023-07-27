<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPM PRO</title>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/jquery.signature.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('admin_assets/js/jquery.signature.js')}}"></script>
</head>
<body>  

<main>  

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

</main>

<script>
    const accordionBtns = document.querySelectorAll(".item-header");
   accordionBtns.forEach((accordion) => {
   accordion.onclick = function () {
   this.classList.toggle("active");

   let content = this.nextElementSibling;
  console.log(content);

  if (content.style.maxHeight) {
    //this is if the accordion is open
    content.style.maxHeight = null;
  } else {
    //if the accordion is currently closed
    content.style.maxHeight = content.scrollHeight + "px";
    console.log(content.style.maxHeight);
  }
};
});
</script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="https://alexandrebuffet.fr/codepen/slider/slick-animation.min.js"></script>
  <script src="{{asset('frontend_assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="{{asset('frontend_assets/js/custom.js')}}"></script>
</body>
</html>