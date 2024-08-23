<style>
:root {
    --main-color: #696cff;
    --main-color-alt: #1787e0;
    --main-trans: 0.3s;
    --main-padd: 100px;
}
.item {
    /* padding-top: var(--main-padd); */
    padding-bottom: var(--main-padd);
    position: relative;
}
.item .main-title{
    text-align: center;
    margin: 40px 0 60px 0;
    position: relative;
}
.item .main-title::after{
    position: absolute;
    content: '';
    width: 70px;
    height: 5px;
    background: #696cff;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
}
.item .container1 {
    padding: 0 60px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
}

.item .container1 .box {
    position: relative;
}

.item .container1 .box::before,
.item .container1 .box::after {
    content: '';
    position: absolute;
    background-color: #f3f3f3;
    right: 0;
    top: 0;
    height: 100%;
    border-radius: 10px;
    transition: var(--main-trans);
}

.item .container1 .box::before {
    width: calc(100% - 60px);
    z-index: -2;
}

.item .container1 .box::after {
    background-color: #e4e4e4;
    width: 0;
    z-index: -1;
}

.item .container1 .box:hover::after {
    width: calc(100% - 60px);
}

.item .container1 .box .data {
    display: flex;
    align-items: center;
    padding-top: 60px;
}

.item .container1 .box .data img {
    width: calc(100% - 60px);
    transition: var(--main-trans);
    margin-right: 60px;
    border-radius: 10px;
}

.item .container1 .box:hover img {
    filter: grayscale(100%);
}

.item .container1 .box .info {
    padding-left: 80px;
}

.item .container1 .box .info h3 {
    margin:20px 60px 20px 0;
    color: var(--main-color);
    font-size: 22px;
    transition: var(--main-trans);
}

.item .container1 .box .info p {
   padding: 0px 60px 25px 0;
}
.item .container1 .box:hover .info h3 {
    color: #777;
}
/* @media(max-width:768px) {
  .item .container1 .box::before,
.item .container1 .box::after {
    content: '';
    position: absolute;
    background-color: #f3f3f3;
    right: 0;
    top: 0;
    height: 450px;
    border-radius: 10px;
    transition: var(--main-trans);
}
} */
/* hero */
.heroImge{
    margin-top: 100px;
    width: 100%;
    height: 80vh;
  }
  .heroDiv{
    width: 100%;
    height: 100%;
    position: relative;
  }
  .heroDiv h1{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    z-index: 9;
    font-size: 56px
  }
  .heroImge .heroDiv::before{
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    background: #696cff;
    opacity: 0.4;
    top: 0;
    z-index: 5;
  }
  .heroImge img{
    width: 100%;
    height: 100%;
  }
</style>
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

@endsection
@section('content')
{{-- <section id="hero-animation">
  <div id="landingHero" class="section-py landing-hero position-relative">
    <div class="container">
      <div class="hero-text-box text-center">
        <h1 class="text-primary hero-title display-4 fw-bold">الأصناف الموجودة</h1>
        <br>
      </div>
      <div class="row g-4" id="categories">
        @foreach ($categories as $category)
        <div class="col-xl-4 col-lg-2 col-md-2">
          <a href="{{ Route('shipping-price') }}">
            <div class="card h-100 border">
              <div class="card-body d-flex flex-column justify-content-between">
                <img src="{{asset('assets/img/category/'.$category->photo)}}" class="img-fluid mx-auto my-4 rounded" style="width: 500px; height: 300px;" alt="...">
                <div class="role-heading text-center">
                  <h5 class="card-title">{{$category->category_name}}</h5>
                  <p class="card-text">{{$category->price_per_weight}}</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section> --}}
<section class="heroImge">
  <div class="heroDiv">
    <img src="{{asset('assets/img/front-pages/landing-page/truck2.jpg')}}" alt="">
    <h1> عناويننا</h1>
  </div>
</section>
<section>
{{-- <div class="item " id="item">
    <h1 class="main-title">المركز الرئيسي </h1>
    <center>
    <p class="item  fw-bolder display-4">دمشق شارع بارون</ح>

    </center>
    <center>
    <h1 class="main-title">الأفرع  </h1>
    <ul class="list-group list-group-timeline d-inline ms-4 ">
      <li class=" d-inline list-group-item list-group-timeline-primary fw-bolder display-5">دمشق شارع بارون</li>
      <li class=" d-inline list-group-item list-group-timeline-success display-5">دمشق شارع بارون</li>
      <li class="d-inline list-group-item list-group-timeline-warning display-5">دمشق شارع بارون</li>
      <li class=" d-inline list-group-item list-group-timeline-info display-5">دمشق شارع بارون</li>
      <li class="  ms-4  list-group-item list-group-timeline-danger display-5">دمشق شارع بارون</li>
    </ul></center>


    {{-- <div class="container1 ">
        @foreach ($categories as $category)
        <a href="{{ Route('shipping-price') }}">
        <div class="box ">
            <div class="data ">
                <img src="{{asset('assets/img/category/'.$category->photo)}}" alt=" ">
            </div>
            <div class="info ">
                <h3>{{$category->category_name}}</h3>
                <p class="card-text">{{$category->price_per_weight}}</p>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</div> --}}
<section>
  <div class="item " id="item">
    {{-- <h1 class="main-title">المركز الرئيسي</h1>
    <p style="text-align: center">دمشق شارع بارون</p> --}}
    <h1 class="main-title">الفروع</h1>
    <div class="container1 ">
        <a href="{{ Route('address-page-a') }}">
        <div class="box ">
            <div class="data ">
                <img src="{{asset('assets/img/category/images.jpeg')}}" alt=" ">
            </div>
            <div class="info ">
                <h3>حلب</h3>
                <p class="card-text"></p>
            </div>
        </div>
        </a>
        <a href="{{ Route('address-page-h') }}">
          <div class="box ">
              <div class="data ">
                  <img src="{{asset('assets/img/category/hama.jpeg')}}" alt=" ">
              </div>
              <div class="info ">
                  <h3>حماة</h3>
                  <p class="card-text"></p>
              </div>
          </div>
          </a>
          <a href="{{ Route('address-page-d') }}">
            <div class="box ">
                <div class="data ">
                    <img src="{{asset('assets/img/category/dam.jpg')}}" alt=" ">
                </div>
                <div class="info ">
                    <h3>دمشق</h3>
                    <p class="card-text"></p>
                </div>
            </div>
            </a>
    </div>
    <br>
    <h1 class="main-title">  مواعيد الدوام:
    </h1>
    <center>
      <h3 class="card-title text-primary">10:00am-2:00pm</h3>
    </center>
    </div>
</div>
</section>
<div class="row mt-5 justify-content-center d-flex w-100 my-5 item "  id="item">
  <h1 class="main-title">تواصل معنا  </h1>
  <div class="demo-vertical-spacing demo-only-element col-md-8 mt-5 ">

    <div class="input-group">
      <span class="input-group-text" id="basic-addon11">@</span>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon11" />
    </div>

    <div class="form-password-toggle">
      <label class="form-label" for="basic-default-password12"></label>
      <div class="input-group">
        <input type="password" class="form-control" id="basic-default-password12" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" />
        <span id="basic-default-password" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
      </div>
    </div>

    <div class="input-group">
      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon13" />
      <span class="input-group-text" id="basic-addon13">@example.com</span>
    </div>

    <div class="input-group">
      <span class="input-group-text" id="basic-addon14">https://example.com/users/</span>
      <input type="text" class="form-control" placeholder="URL" id="basic-url1" aria-describedby="basic-addon14" />
    </div>

    <div class="input-group">
      <span class="input-group-text">$</span>
      <input type="number" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)" />
      <span class="input-group-text">.00</span>
    </div>

    <div class="input-group">
      <span class="input-group-text">With textarea</span>
      <textarea class="form-control" aria-label="With textarea" placeholder="Comment"></textarea>
    </div>
    <button class="btn-primary btn w-25 rounded-3">تاكيد</button>

  </div>
  </div>
</section>
  <!-- Add more category cards as needed -->

@endsection
