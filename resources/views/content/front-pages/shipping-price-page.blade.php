<style>

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
{{-- @section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection --}}

{{-- @section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

@endsection --}}

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />
@endsection

@section('vendor-script')

<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')

<script src="{{asset('js/demo-ship.js')}}"></script>

@endsection

@section('content')
<section class="heroImge">
  <div class="heroDiv">
    <img src="{{asset('assets/img/front-pages/landing-page/truck1.jpg')}}" alt="">
    <h1>تكلفة الشحن</h1>
  </div>
</section>
<section id="hero-animation" class="landing-cta">
  <div id="landingHero" class="pt-5 position-relative">
    <div class="container">
      <div class="hero-text-box text-center">
        <h1 class="text-primary hero-title display-4 fw-bold"> الاستعلام عن تكاليف الشحن حسب الصنف</h1>
        <br>
      </div>
      <div class="row justify-content-center">
        <div class="">
          <div class="card mb-4">
            <h5 class="card-header">أجور الشحن</h5>

            <div class="m-3 d-flex justify-center items-center">
                  {{-- my form --}}
              <form  id="demoShip">
                <div id="address" class="content">
                  <div class="content-header justify-content-between mb-3 d-flex">
                    <div>
                      <small>أدخل معلومات الشحنة.</small>
                    </div>


                  </div>
                  <div class="row g-3">

                   <div class="row g-3 shipment-line" >

                    <div class="col-sm-4">
                      <label class="form-label" for="category">فئات الشحن</label>
                      <select class="form-select   myCategory" name="category" id="category_shipment">
                            <option value="{{ $category_Detail->category_id}}" label=" ">{{ $category_Detail->category_name}}</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label"  for="category-detail"> تفاصيل فئات الشحن </label>
                      <select class="form-select myCategorydetaile" id="category-detail" name="category_detail" >
                        <option >اختر تفاصيل الفئة</option>
                        @foreach ($category_Detail->categoryDetail as $c )
                          @if($c->category_id == $id)
                            <option value="{{$c->id}}" label=" ">{{$c->type}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-4">

                      <label class="form-label" for="quantity">الكمية</label>
                      <input type="number" name="quantity" class="form-control calculate-cost quantity" id="quantity" placeholder=" عدد الطرود المراد شحنها">
                    </div>

                    <div class="col-sm-4">
                      <label class="form-label" for="price_for_wight">السعر للفئة</label>
                      <input type="text" name="price_for_wight"   class="form-control price_for_wight calculate-cost" readonly id="price_for_wight" placeholder="Birmingham">
                    </div>
                    <div class="col-sm-4">
                      <label class="form-label" for="total_wight">اجمالي الوزن</label>
                      <input type="text" name="total_wight" class="form-control calculate-cost total_wight" readonly id="total_wight" placeholder="الوزن ان وجد">
                    </div>

                            {{-- <hr> --}}
                  </div>
                    <div class="col-12 d-flex justify-content-center">
                      <button type="submit" id="submit-btn" class="btn btn-label-primary w-25">
                        {{-- <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i> --}}
                        <span class="align-middle d-sm-inline-block d-none">تأكيد</span>
                      </button>
                      {{-- <button class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">القادم</span>
                        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                      </button> --}}
                    </div>
                  </div>
                </div>
              </form>


            </div>
            <hr>

              <div id="demoCalc" class="d-flex justify-content-center mb-4 w-100 d-none">
                <div class="col-md-6">
                  <div class="  card shadow-none bg-transparent border border-primary">
                    <div class="card-header text-center">التكلفة الاجمالية</div>
                    <div class="card-body text-center text-primary">
                      <h5 class=" card-title">تكلفة الشحن المتوقعة</h5>
                      <span id="total-cost" class="fw-bold text-end card-text">

                      </span><span>ليرة</span>
                    </div>
                  </div>


                </div>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Form controls -->
@endsection
