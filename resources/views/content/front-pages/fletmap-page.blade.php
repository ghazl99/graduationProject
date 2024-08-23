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
  .otc {
	position: relative;
	width: 320px;
	margin: 0 auto;
}

.otc fieldset {
	border: 0;
	padding: 0;
	margin: 0;
}

.otc fieldset div {
	display: flex;
	align-items: center;
	justify-content: center
}

.otc legend {
	margin: 0 auto 1em;
	color: #fff;
	font-weight: bold;
}

input[type="number"] {
	width: .86em;
	line-height: 1;
	margin: .1em;
	padding: 8px 0 4px;
	font-size: 2.65em;
	text-align: center;
	appearance: textfield;
	-webkit-appearance: textfield;
	border: 0;
	color: #073A39;
	border-radius: 6px;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* 2 groups of 3 items */
input[type="number"]:nth-child(n+4) {
	order: 2;
}
.otc div::before {
	content: '';
	height: 2px;
	width: 12px;
	margin: 0 .25em;
	order: 1;
	background: #fff;
	border-radius: 2px;
	opacity: .4;
}

/* From: https://gist.github.com/ffoodd/000b59f431e3e64e4ce1a24d5bb36034 */
.otc label {
	border: 0 !important;
	clip: rect(1px, 1px, 1px, 1px) !important;
	-webkit-clip-path: inset(50%) !important;
	clip-path: inset(50%) !important;
	height: 1px !important;
	margin: -1px !important;
	overflow: hidden !important;
	padding: 0 !important;
	position: absolute !important;
	width: 1px !important;
	white-space: nowrap !important;
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

<link rel="stylesheet" href="{{asset('assets/vendor/libs/maplibre-gl/maplibre-gl.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-logistics-fleet.css')}}" />

@endsection

@section('vendor-script')
<script src="https://unpkg.com/@esri/arcgis-rest-request@4.0.0/dist/bundled/request.umd.js"></script>
<script src="https://unpkg.com/@esri/arcgis-rest-routing@4.0.0/dist/bundled/routing.umd.js"></script>

<script src="{{asset('assets/vendor/libs/maplibre-gl/maplibre-gl.js')}}"></script>

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
<script src="{{asset('js/flat.js')}}"></script>

<script src="{{asset('assets/js/app-logistics-fleet.js')}}"></script>
@endsection

@section('content')
<section class="heroImge">
  <div class="heroDiv">
    <img src="{{asset('assets/img/front-pages/landing-page/truck1.jpg')}}" alt="">
    <h1>تتبع الشحن</h1>
  </div>
</section>
<section id="hero-animation" class="landing-cta">
  <div class="hero-text-box text-center">
    <h1 class="text-primary hero-title display-4 fw-bold pt-4">تعقب شحناتك هنا    </h1>
    <br>
  </div>
  <div class="">  <center><h4 class="pt-5 pb-3">ادخل رقم الفاتورة</h4></center>
    <form class="otc" name="one-time-code" action="#">
      <fieldset>

        <label for="otc-1">Number 1</label>
        <label for="otc-2">Number 2</label>
        <label for="otc-3">Number 3</label>
        <label for="otc-4">Number 4</label>
        <label for="otc-5">Number 5</label>
        <label for="otc-6">Number 6</label>


        <div>
        <input type="number" pattern="[0-9]*"  value="" inputtype="numeric" autocomplete="one-time-code" id="otc-1" required>


        <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-2" required>
        <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-3" required>
        <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-4" required>
        <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-5" required>
        <input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-6" required>
        </div>
      </fieldset>
<div class="my-3 w-100 d-flex justify-content-center">
        <button class="btn btn-outline-primary"> تعقب شحنتك</button>
      </div>
    </form>
  </div>
  <div id="landingHero" class="pt-5 position-relative">
    <div class="col h-100 map-container d-flex justify-content-center align-content-center">
      <!-- Map -->
      <div id="map" class="w-50 h-50"></div>
    </div>
  </div>
</section>
<!-- Form controls -->
@endsection
