<style>

  .features-icon-box {
    position: relative;
    padding: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  .features-icon-box::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 2px solid #5d10af67;
    z-index: -1;
    transform: scale(1.1);
    opacity: 0;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
  }

  .features-icon-box:hover::before {
    transform: scale(1);
    opacity: 1;
  }

  :root {
    --main-color: #696cff;
    --main-color-alt: #1787e0;
    --main-trans: 0.3s;
    --main-padd: 100px;
}

/* slider show  */

.slideA{
  margin-top: 40px;
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
  .slide-container{
    position: relative;
    width: 100%;
    border: 3px solid #ede6de;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
  }
  .slide-container .slides{
    width: 100%;
    height:85vh;
    position: relative;
    overflow: hidden;
  }
  .slide-container .slides img{
    width: 100%;
    height: calc(100%);
    position: absolute;
    object-fit: cover;
  }
  .slide-container .slides img:not(.active){
    top: 0;
    left: -100%;
  }
  .slide-container .slides::before{
    position: absolute;
    top: 0;
    content: '';
    width: 100%;
    height: 100%;
    background: #696cff;
    z-index: 2;
    opacity: 0.4;
  }
  span.next,span.prev{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    padding: 14px;
    background: #696cff;
    color: #ffffff;
    font-size: 24px;
    font-weight: bold;
    transition: 0.5s;
    border-radius: 3px;
    user-select: none;
    cursor: pointer;
    z-index: -1;
  }
  /* span.next{
    left: 20px;
  }
  span.prev{
    right: 20px;
  }
  span.next:hover,span.prev:hover{
    background: #9e9fff;
    opacity: 0.8;
    /* color: #222; */
  /* } */
  .dots{
    position: absolute;
    bottom: 20px;
    z-index: 5;
    left: 50%;
    transform: translateX(-50%);
    /* background: #696cff; */
    border-radius: 5px;
    padding: 10px 15px;
  }
  .dots .dot{
    width: 15px;
    height: 15px;
    background: #fff;
    margin: 5px 10px 0 10px;
    /* border: 3px solid #fff; */
    border-radius: 50%;
    display: inline-block;
    transition: backgroung-color 0.6s ease;
  }
  .dots .active{
    background: #696cff;
  }
  .content{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
    z-index: 5;
  }
  .content h1{
    color: white;
    font-size: 56px
  }
  @media(max-width:990px) {
    .content h1{
      font-size: 35px;
    }
}
@media(max-width:450px) {
    .content h1{
      font-size: 20px;
    }
}
@keyframes next1{
  from{
    left: 0%;
  }
  to{
    left: -100%;
  }
}
@keyframes next2{
  from{
    left: 100%;
  }
  to{
    left: 0%;
  }
}
/* title mian */
.main-title{
    text-align: center;
    margin: 40px 0 60px 0;
    position: relative;
}
.main-title::after{
    position: absolute;
    content: '';
    width: 70px;
    height: 5px;
    background: #696cff;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
}
/* enquiry */
.services {
    /* padding-top: var(--main-padd);*/
    padding-bottom: var(--main-padd);
    position: relative;
    /* width: 100%; */
    /* background-color: #ececec; */
}
.services .container1 {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 40px;
    margin: 100px 200px 0px 200px ;
}

.services .box {
    box-shadow: 0 12px 20px 0 rgba(0, 0, 0, 0.13), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
    counter-increment: services;
    transition: var(--main-trans);
    position: relative;
}

.services .box::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    height: 3px;
    top: -3px;
    background-color: var(--main-color);
    width: 0;
    transition: var(--main-trans);
}

.services .box:hover {
    transform: translateY(-10px);
}

.services .box:hover::before {
    width: 100%;
}

.services .box>i {
    margin: 40px auto 20px;
    display: block;
    text-align: center;
}

.services .box>h3 {
    text-align: center;
    margin: 20px 0 40px;
    font-size: 25px;
    color: var(--main-color);
}

.services .box .info {
    padding: 15px;
    position: relative;
    text-align: right;
}

.services .box .info a {
    color: var(--main-color);
}
.services .box:hover .info::before{
  color: white;
}

.services .box .info::before {
    content: '0' counter(services);
    position: absolute;
    background-color: #e7e7ff;
    color: #696cff;
    left: 0;
    top: 0;
    height: 100%;
    width: 100px;
    font-size: 30px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-right: 15px;
    transition: var(--main-trans);
}
.services .box:hover .info::before {
    background: var(--main-color);
}
.services .box .info::after {
    content: '';
    position: absolute;
    background-color: #B6BBC4;
    top: 0;
    left: 80px;
    width: 50px;
    height: calc(100% + 0.4px);
    transform: skewX(-30deg);
}
.services .box i{
  transition: var(--main-trans);
}
.services .box:hover i{
  color: #696cff;
}
.services .box .info::before {
    content: '0' counter(services);
    position: absolute;
    background-color: #9798b7;
    color: #c8cdd6;
    left: 0;
    top: 0;
    height: 100%;
    width: 100px;
    font-size: 30px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-right: 15px;
    transition: var(--main-trans);
}
@media(max-width:768px) {
  .services .container1{
      margin: 0 50px 0 50px;
    }
}
@media(max-width:450px) {
    .services .container1{
      margin: 0;
    }
}
</style>
{{-- slider show js --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
  const slideImage = document.getElementsByClassName("A");
  const next = document.getElementsByClassName("prev")[0];
  const dots =document.getElementsByClassName("dot");
  console.log(slideImage);
  console.log(next);
  console.log(dots);
  var counter=0;
  next.addEventListener('click',slidNext);
  function slidNext(){
    slideImage[counter].style.animation="next1 0.5s ease-in forwards";
    if(counter>=slideImage.length-1){
      counter=0;}
    else{counter++;}
    slideImage[counter].style.animation="next2 0.5s ease-in forwards";
    dott();
  }
  function autoSlide(){
    deletInter=setInterval(timer,3500);
    function timer(){
      slidNext();
      dott();
    }
  }
  autoSlide();
  function dott(){
      for(let i=0;i<dots.length;i++){
        dots[i].className=dots[i].className.replace(' active','');
      }
      dots[counter].className+=' active';
  }
});


</script>
@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Landing - Front Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/front-page-landing.js')}}"></script>
@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Hero: Start -->

<section class="slideA">
  <div class="slide-container">
      <div class="slides">
          <img class="active A" src="{{asset('assets/img/front-pages/landing-page/truck1.jpg')}}" alt=""/>
          <img class="A" src="{{asset('assets/img/front-pages/landing-page/truck2.jpg')}}" alt=""/>
          <img class="A" src="{{asset('assets/img/front-pages/landing-page/truck3.jpg')}}" alt=""/>
          <img class="A" src="{{asset('assets/img/front-pages/landing-page/truck4.jpg')}}" alt=""/>
      </div>
      <div class="buttons">
          <span class="next">&#10095;</span>
          <span class="prev">&#10094;</span>
      </div>
      <div class="dots">
          <div class="dot active" attr='0'></div>
          <div class="dot" attr='1'></div>
          <div class="dot" attr='2'></div>
          <div class="dot" attr='3'></div>
      </div>
      <div class="content">
        <h1>عبر عن تجارتك الإلكترونية</h1>
      </div>
  </div>
</section>


  <!-- Hero: End -->

  <!-- Useful features: Start -->
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
    <div class="services" id="services">
        <h2 class="main-title ">الاستعلام</h2>
        <div class="container1">

          <div class="box">
              <i class="bx bxs-file bx-lg me-2"></i>
              <h3>أسعار الشحن</h3>
              <div class="info">
                <a href="{{ Route('categories') }}">تفاصيل</a>
              </div>
          </div>
          <div class="box">
            <i class="bx bxs-map-pin bx-lg me-2"></i>
            <h3>تتبع الشحنة</h3>
            <div class="info">
              <a href="{{ Route('fletmap-page') }}">تفاصيل</a>
            </div>
         </div>
          <div class="box">
              <i class="bx bxs-map bx-lg me-2"></i>
              <h3>الفروع</h3>
              <div class="info">
                  <a  href="{{ Route('address-page') }}">تفاصيل</a>
              </div>
          </div>

        </div>
      </div>
  </section>
  <!-- Useful features: End -->

  <!-- Real customers reviews: Start -->
  {{-- <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
    <!-- What people say slider: Start -->
    <div class="container">
      <div class="row align-items-center gx-0 gy-4 g-lg-5">
        <div class="col-md-6 col-lg-5 col-xl-3">
          <div class="mb-3 pb-1">
            <span class="badge bg-label-primary">Real Customers Reviews</span>
          </div>
          <h3 class="mb-1"><span class="section-title">What people say</span></h3>
          <p class="mb-3 mb-md-5">
            See what our customers have to<br class="d-none d-xl-block" />
            say about their experience.
          </p>
          <div class="landing-reviews-btns d-flex align-items-center gap-3">
            <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn" type="button">
              <i class="bx bx-chevron-left bx-sm"></i>
            </button>
            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
              <i class="bx bx-chevron-right bx-sm"></i>
            </button>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-9">
          <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
            <div class="swiper" id="swiper-reviews">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-1.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “Vuexy is hands down the most useful front end Bootstrap theme I've ever used. I can't wait
                        to use it again for my next project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Cecilia Payne</h6>
                          <p class="small text-muted mb-0">CEO of Airbnb</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-2.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-3.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        This template is really clean & well documented. The docs are really easy to understand and
                        it's always easy to find a screenshot from their website.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Curtis Fletcher</h6>
                          <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-4.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        All the requirements for developers have been taken into consideration, so I’m able to build
                        any interface I want.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bx-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/4.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-5.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="{{asset('assets/img/front-pages/branding/logo-6.png')}}" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo mollitia, ad eum
                        officia numquam nostrum repellendus consequuntur!
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bx-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- What people say slider: End -->
    <hr class="m-0" />
    <!-- Logo slider: Start -->
    <div class="container">
      <div class="swiper-logo-carousel py-4 my-lg-2">
        <div class="swiper" id="swiper-clients-logos">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_1-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_1-light.png" data-app-dark-img="front-pages/branding/logo_1-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_2-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_2-light.png" data-app-dark-img="front-pages/branding/logo_2-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_3-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_3-light.png" data-app-dark-img="front-pages/branding/logo_3-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_4-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_4-light.png" data-app-dark-img="front-pages/branding/logo_4-dark.png" />
            </div>
            <div class="swiper-slide">
              <img src="{{asset('assets/img/front-pages/branding/logo_5-'.$configData['style'].'.png')}}" alt="client logo" class="client-logo" data-app-light-img="front-pages/branding/logo_5-light.png" data-app-dark-img="front-pages/branding/logo_5-dark.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Logo slider: End -->
  </section> --}}
  <!-- Real customers reviews: End -->

  <!-- Our great team: Start -->
  {{-- <section id="landingTeam" class="section-py landing-team">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Our Great Team</span>
      </div>
      <h3 class="text-center mb-1"><span class="section-title">Supported</span> by Real People</h3>
      <p class="text-center mb-md-5 pb-3">Who is behind these great-looking interfaces?</p>
      <div class="row gy-5 mt-2">
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-primary position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-1.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid" alt="human image" />
            </div>
            <div class="card-body border border-label-primary border-top-0 text-center">
              <h5 class="card-title mb-0">Sophie Gilbert</h5>
              <p class="text-muted mb-0">Project Manager</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-info position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-2.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid" alt="human image" />
            </div>
            <div class="card-body border border-label-info border-top-0 text-center">
              <h5 class="card-title mb-0">Paul Miles</h5>
              <p class="text-muted mb-0">UI Designer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-danger position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-3.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid" alt="human image" />
            </div>
            <div class="card-body border border-label-danger border-top-0 text-center">
              <h5 class="card-title mb-0">Nannie Ford</h5>
              <p class="text-muted mb-0">Development Lead</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card mt-3 mt-lg-0 shadow-none">
            <div class="bg-label-success position-relative team-image-box">
              <img src="{{asset('assets/img/front-pages/landing-page/team-member-4.png')}}" class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid" alt="human image" />
            </div>
            <div class="card-body border border-label-success border-top-0 text-center">
              <h5 class="card-title mb-0">Chris Watkins</h5>
              <p class="text-muted mb-0">Marketing Manager</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- Our great team: End -->

  <!-- Pricing plans: Start -->
  <section id="landingPricing" class="section-py bg-body landing-pricing">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">خطط التسعير</span>
      </div>
      <h3 class="text-center mb-1"><span class="section-title">خطط تسعير</span> مصممة لأجلك</h3>
      <p class="text-center mb-4 pb-3">
        تتضمن جميع الخطط أكثر من 40 أداة وميزات متقدمة لتعزيز منتجك.<br />اختر أفضل خطة تناسب احتياجاتك.
      </p>
      <div class="text-center mb-5">
        <div class="position-relative d-inline-block pt-3 pt-md-0">
          <label class="switch switch-primary me-0">
            <span class="switch-label">الدفع شهريا</span>
            <input type="checkbox" class="switch-input price-duration-toggler" checked />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label">الدفع سنوي</span>
          </label>
          <div class="pricing-plans-item position-absolute d-flex">
            <img src="{{asset('assets/img/front-pages/icons/pricing-plans-arrow.png')}}" alt="pricing plans arrow" class="scaleX-n1-rtl" />
            <span class="fw-semibold mt-2 ms-1"> حفظ  25%</span>
          </div>
        </div>
      </div>
      <div class="row gy-4 pt-lg-3">
        <!-- Basic Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/paper-airplane.png')}}" alt="paper airplane icon" class="mb-4 pb-2 scaleX-n1-rtl" />
                <h4 class="mb-1">اساسي</h4>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h1 text-primary fw-bold mb-0">19</span>
                  <span class="price-yearly h1 text-primary fw-bold mb-0 d-none">14</span>
                  <sub class="h6 text-muted mb-0 ms-1">/شهريا</sub>
                </div>
                <div class="position-relative pt-2">
                  <div class="price-yearly text-muted price-yearly-toggle d-none"> 168 / year</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    الجدول الزمني
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    البحث الأساسي
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    التسويق عبر البريد الإلكتروني
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    النماذج المخصصة
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    تحليلات حركة المرور
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{url('/front-pages/payment')}}" class="btn btn-label-primary">إبدأ</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Plan: End -->

        <!-- Favourite Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card border border-primary shadow-lg">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/plane.png')}}" alt="plane icon" class="mb-4 pb-2 scaleX-n1-rtl" />
                <h4 class="mb-1">فريق</h4>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h1 text-primary fw-bold mb-0">29</span>
                  <span class="price-yearly h1 text-primary fw-bold mb-0 d-none">22</span>
                  <sub class="h6 text-muted mb-0 ms-1">/شهريا</sub>
                </div>
                <div class="position-relative pt-2">
                  <div class="price-yearly text-muted price-yearly-toggle d-none"> 264 / year</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    الجدول الزمني مع قاعدة البيانات
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    البحث المتقدم
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    أتمتة التسويق
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    روبوت الدردشة المتقدم
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    إدارة الحملة
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{url('/front-pages/payment')}}" class="btn btn-primary">إبدأ</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Favourite Plan: End -->

        <!-- Standard Plan: Start -->
        <div class="col-xl-4 col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="{{asset('assets/img/front-pages/icons/shuttle-rocket.png')}}" alt="shuttle rocket icon" class="mb-4 pb-2 scaleX-n1-rtl" />
                <h4 class="mb-1">مشروع</h4>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="price-monthly h1 text-primary fw-bold mb-0">49</span>
                  <span class="price-yearly h1 text-primary fw-bold mb-0 d-none">37</span>
                  <sub class="h6 text-muted mb-0 ms-1">/شهريا</sub>
                </div>
                <div class="position-relative pt-2">
                  <div class="price-yearly text-muted price-yearly-toggle d-none"> 444 / year</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    الجدول الزمني مع قاعدة البيانات
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    بحث عميق
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    أذونات مخصصة
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    أتمتة وسائل التواصل الاجتماعي
                  </h5>
                </li>
                <li>
                  <h5>
                    <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                    أدوات أتمتة المبيعات
                  </h5>
                </li>
              </ul>
              <div class="d-grid mt-4 pt-3">
                <a href="{{url('/front-pages/payment')}}" class="btn btn-label-primary">إبدأ</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Standard Plan: End -->
      </div>
    </div>
  </section>
  <!-- Pricing plans: End -->

  <!-- Fun facts: Start -->
  {{-- <section id="landingFunFacts" class="section-py landing-fun-facts">
    <div class="container">
      <div class="row gy-3">
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-label-primary shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">7.1k+</h5>
              <p class="fw-medium mb-0">
                Support Tickets<br />
                Resolved
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-label-success shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/user-success.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">50k+</h5>
              <p class="fw-medium mb-0">
                Join creatives<br />
                community
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-label-info shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">4.8/5</h5>
              <p class="fw-medium mb-0">
                Highly Rated<br />
                Products
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card border border-label-warning shadow-none">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop" class="mb-2" />
              <h5 class="h2 mb-1">100%</h5>
              <p class="fw-medium mb-0">
                Money Back<br />
                Guarantee
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- Fun facts: End -->

  <!-- FAQ: Start -->
  <section id="landingFAQ" class="section-py bg-body landing-faq">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">الأسئلة الشائعة</span>
      </div>
      <h3 class="text-center mb-1">الأسئلة <span class="section-title">الشائعة</span></h3>
      <p class="text-center mb-5 pb-3">تصفح هذه الأسئلة الشائعة للعثور على إجابات للأسئلة الشائعة.</p>
      <div class="row gy-5">
        <div class="col-lg-5">
          <div class="text-center">
            <img src="{{asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png')}}" alt="faq boy with logos" class="faq-image" />
          </div>
        </div>
        <div class="col-lg-7">
          <div class="accordion" id="accordionExample">
            <div class="card accordion-item active">
              <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                  هل يتم جمع رسوم؟
                </button>
              </h2>

              <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                  marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                  soufflé. Wafer gummi bears marshmallow pastry pie.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                  ماهو الترخيص العادي؟
                </button>
              </h2>
              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                  dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies. Jelly
                  beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                  ماهو الترخيص المتعدد؟
                </button>
              </h2>
              <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Regular license can be used for end products that do not charge users for access or service(access
                  is free and there will be no monthly subscription fee). Single regular license can be used for
                  single end product and end product can be used by you or your client. If you want to sell end
                  product to multiple clients then you will need to purchase separate license for each client. The
                  same rule applies if you want to use the same end product on multiple domains(unique setup). For
                  more info on regular license you can check official description.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                  هل يتم جمع رسوم؟
                </button>
              </h2>
              <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis et aliquid quaerat possimus maxime!
                  Mollitia reprehenderit neque repellat delenibx delectus architecto dolorum maxime, blanditiis
                  earum ea, incidunt quam possimus cumque.
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive">
                  ماهو الترخيص العادي؟
                </button>
              </h2>
              <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestias exercitationem ab cum
                  nemo facere voluptates veritatis quia, eveniet veniam at et repudiandae mollitia ipsam quasi
                  labore enim architecto non!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ: End -->

  <!-- CTA: Start -->

  <!-- CTA: End -->

  <!-- Contact Us: Start -->
  <section id="landingContact" class="section-py bg-body landing-contact">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">تواصل معنا</span>
      </div>
      <h3 class="text-center mb-1"><span class="section-title">دعونا نعمل معا</span></h3>
      <p class="text-center mb-4 mb-lg-5 pb-md-3">أي سؤال أو ملاحظة؟ فقط اكتب لنا رسالة</p>
      <div class="row gy-4">
        <div class="col-lg-5">
          <div class="contact-img-box position-relative border p-2 h-100">
            <img src="{{asset('assets/img/front-pages/landing-page/contact-customer-service.png')}}" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
            <div class="pt-3 px-4 pb-1">
              <div class="row gy-3 gx-md-4">
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-primary rounded p-2 me-2"><i class="bx bx-envelope bx-sm"></i></div>
                    <div>
                      <p class="mb-0">البريد الإلكتروني</p>
                      <h5 class="mb-0">
                        <a href="mailto:example@gmail.com" class="text-heading">example@gmail.com</a>
                      </h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="d-flex align-items-center">
                    <div class="badge bg-label-success rounded p-2 me-2">
                      <i class="bx bx-phone-call bx-sm"></i>
                    </div>
                    <div>
                      <p class="mb-0">الهاتف</p>
                      <h5 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+1234 568 963</a></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-1">ارسل رسالة</h4>
              <p class="mb-4">
                إذا كنت ترغب في مناقشة أي شيء متعلق بالدفع أو الحساب أو الترخيص أو الشراكات أو لديك أسئلة ما قبل البيع, فأنت في المكان الصحيح
              </p>
              <form>
                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-fullname">الأسم الكامل</label>
                    <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="contact-form-email">البريد الإلكتروني</label>
                    <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="contact-form-message">رسالة</label>
                    <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">أرسل</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Us: End -->
</div>
@endsection
