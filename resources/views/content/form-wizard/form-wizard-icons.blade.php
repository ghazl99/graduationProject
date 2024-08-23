@extends('layouts/layoutMaster')

@section('title', 'Wizard Icons - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

@endsection

@section('page-script')
{{-- <script src="{{asset('assets/js/form-wizard-icons.js')}}"></script> --}}
<script src="{{asset('js/myform-wizard-icons.js')}}"></script>

@endsection
@php
$role = ['المشرف', 'موظف إدارة الشحن'];
@endphp
@if (Auth::user()->hasRole($role))
  @section('content')

  <!-- Default -->
  <div class="row">
    <div class="col-12">
      <h5>إنشاء طلب شحن جديد</h5>
    </div>

    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">

      <div  class="bs-stepper wizard-icons wizard-icons-example mt-2">

        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-account.svg#wizardAccount')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">معلومات المرسل</span>
            </button>
          </div>
          <div class="line">
            <i class="bx bx-chevron-right"></i>
          </div>
          <div class="step" data-target="#personal-info">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 58 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-personal.svg#wizardPersonal')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">معلومات المرسل إليه</span>
            </button>
          </div>
          <div class="line">
            <i class="bx bx-chevron-right"></i>
          </div>
          <div class="step" data-target="#address">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-address.svg#wizardAddress')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">معلومات الشحن</span>
            </button>
          </div>
          <div class="line">
            <i class="bx bx-chevron-right"></i>
          </div>
          <div class="step" data-target="#review-submit">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-submit.svg#wizardSubmit')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">المراجعة والتقديم</span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          {{-- myformmm --}}
          <form onSubmit="return false" id="wizard-validation-form" >
            <!-- Account Details -->
            <div id="account-details" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">معلومات المرسل</h6>
                <small>أدخل معلومات المرسل.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-4">
                  <label class="form-label" for="first_name_s">الأسم الأول </label>
                  <input type="text" id="first_name_s" name="first_name_s" class="form-control" placeholder="الأسم الأول " />
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="middle_name_s">الأسم الأوسط</label>
                  <input type="text" id="middle_name_s" name="middle_name_s" class="form-control" placeholder="johndoe" />
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="last_name_s">الأسم الأخير</label>
                  <input type="text" id="last_name_s" name="last_name_s" class="form-control" placeholder="johndoe" />
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="national_id_s">الرقم الوطني</label>
                  <input type="text" id="national_id_s" name="national_id_s" class="form-control" placeholder="National Id" />
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="phone_s">رقم الهاتف </label>
                  <input type="text" id="phone_s" name="phone_s" class="form-control" placeholder="johndoe" />
                </div>
                  <div class="col-sm-4">
                    <label class="form-label" for="email_s">الايميل</label>
                    <input type="email" id="email_s" name="email_s" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                  </div>
                  <div class="col-sm-12">
                    <label class="form-label" for="address_s">العنوان</label>
                    <input type="text" id="address_s" name="address_s" class="form-control" placeholder="Enter Address" />
                  </div>

                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">القادم</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">معلومات المرسل إليه</h6>
                <small>أدخل معلومات المرسل إليه.</small>
              </div>
              <div class="row g-3"> <div class="col-sm-4">
                <label class="form-label" for="first_name_r">الأسم الأول </label>
                <input type="text" id="first_name_r" name="first_name_r" class="form-control" placeholder="الأسم الأول " />
              </div>
              <div class="col-sm-4">
                <label class="form-label" for="middle_name_r">الأسم الأوسط</label>
                <input type="text" id="middle_name_r" name="middle_name_r" class="form-control" placeholder="johndoe" />
              </div>
              <div class="col-sm-4">
                <label class="form-label" for="last_name_r">الأسم الأخير</label>
                <input type="text" id="last_name_r" name="last_name_r" class="form-control" placeholder="johndoe" />
              </div>
              <div class="col-sm-4">
                <label class="form-label" for="national_id_r">الرقم الوطني</label>
                <input type="text" id="national_id_r" name="national_id_r" class="form-control" placeholder="National Id" />
              </div>
              <div class="col-sm-4">
                <label class="form-label" for="phone_r">رقم الهاتف </label>
                <input type="text" id="phone_r" name="phone_r" class="form-control" placeholder="johndoe" />
              </div>
                <div class="col-sm-4">
                  <label class="form-label" for="email_r">الايميل</label>
                  <input type="email" id="email_r" name="email_r" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                </div>
                <div class="col-sm-12">
                  <label class="form-label" for="address_r">العنوان</label>
                  <input type="text" id="address_r" name="address_r" class="form-control" placeholder="Enter Address" />
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">القادم</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- Shipment info -->
            <div id="address" class="content">
              <div class="content-header justify-content-between mb-3 d-flex">
                <div>
                  <h6 class="mb-0">الشحنة</h6>
                  <small>أدخل معلومات الشحنة.</small>
                </div>
                <div class="d-flex justify-content-end">
                  <button class="btn btn-primary  addRowBtn">أضافة طلب اضافي +</button>
                </div>

              </div>
              <div class="row g-3">
                <div class="col-sm-4">
                  <label class="form-label" for="Delivery">وقت التسليم</label>
                  <input class="form-control" type="date"  name="shipping_delivery" id="shipping_delivery"  />
                </div>
                {{-- source --}}
                <div class="col-sm-4">
                  <label class="form-label" for="source">مصدر الشحن</label>
                  <select class="form-select" name="source" id="s">
                    <option value="">اختر مصدر الشحن</option>
                    @foreach ($addresses as $address)
                      <option value="{{$address->id}}">{{$address->source}}</option>
                    @endforeach
                  </select>
                </div>

                {{-- destination --}}
                <div class="col-sm-4">
                  <label class="form-label" for="destination">وجهة الشحن</label>
                  <select class="form-select" name="destination" id="d">
                    <option value="">اختر وجهة الشحن</option>
                    @foreach ($addresses as $address)
                      <option value="{{$address->id}}">{{$address->destination}}</option>
                    @endforeach
                  </select>
                </div>
              <div class="row g-3 shipment-line" >

                <div class="col-sm-4">
                  <label class="form-label" for="category">فئات الشحن</label>
                  <select class="form-select   myCategory" name="category[]" id="category_shipment">
                    <option value="">اختر الفئة</option>

                    @foreach ($categories as $category )
                    <option value="{{ $category->category_id}}" label=" ">{{ $category->category_name}}</option>

                    @endforeach
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="form-label"  for="category-detail"> تفاصيل فئات الشحن </label>
                  <select class="form-select myCategorydetaile" id="category-detail" name="category_detail" >
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="quantity">الكمية</label>
                  <input type="number" name="quantity[]" class="form-control calculate-cost quantity" id="quantity" placeholder="اختر عدد الطرود المراد شحنها">
                </div>

                <div class="col-sm-4">
                  <label class="form-label" for="price_for_wight">السعر للفئة</label>
                  <input type="text" name="price_for_wight[]"   class="form-control price_for_wight calculate-cost" id="price_for_wight" placeholder="السعر حسب الطرد">
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="total_wight"> الوزن</label>
                  <input type="text" name="total_wight[]" class="form-control calculate-cost total_wight" id="total_wight" placeholder="الوزن">
                </div>
                <div class="col-sm-4">
                  <label class="form-label" for="line_total_cost">التكلفة</label>
                  <input type="text" name="line_total_cost[]" class="form-control line_total_cost" id="line_total_cost" placeholder="">
                </div>
                <div>
                  <label for="description" class="form-label">تفاصيل عن الشحنة</label>
                  <textarea class="form-control description" name="description" id="description" rows="3"></textarea>
                </div>
                        <hr>
              </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">القادم</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- Social Links -->
            {{-- <div id="social-links" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Social Links</h6>
                <small>Enter Your Social Links.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="twitter">Twitter</label>
                  <input type="text" name="twitter" id="twitter" class="form-control" placeholder="https://twitter.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="facebook">Facebook</label>
                  <input type="text" name="facebook" id="facebook" class="form-control" placeholder="https://facebook.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="google">Google+</label>
                  <input type="text" name="google" id="google" class="form-control" placeholder="https://plus.google.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="linkedin">Linkedin</label>
                  <input type="text" name="linkedIn" id="linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div> --}}
            <!-- Review -->
            <div id="review-submit" class="content">

              <p class="fw-medium mb-2">معلومات المرسل</p>
              <ul class="list-unstyled">
                <li id="review-national-id-s"></li>
                <li>
                  <span id="review-first-s"></span>
                  <span id="review-middle-s"></span>
                  <span id="review-last-s"></span>
                </li>
                <li id="review-email-s"></li>
                <li id="review-phone-s"></li>
                <li id="review-address-s"></li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">معلومات المستقبل</p>
              <ul class="list-unstyled">
                <li id="review-national-id-r"></li>
                <li>
                  <span id="review-first-r"></span>
                  <span id="review-middle-r"></span>
                  <span id="review-last-r"></span>
                </li>
                <li id="review-email-r"></li>
                <li id="review-phone-r"></li>
                <li id="review-address-r"></li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">الشحنة</p>
              <ul class="list-unstyled">
                <li id="review-s"></li>
                <li id="review-d"></li>

                <li id="review-quantity"></li>
                <li id="review-category"></li>
                <li id="review-price_for_wight"></li>
                <li id="review-line_total_cost"></li>
                <li id="review-total_wight"></li>

              </ul>
              <hr>

              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                  <span class="align-middle d-sm-inline-block d-none">السابق</span>
                </button>
                <button class="btn btn-success btn-submit">تاكيد</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Default Icons Wizard -->

    <!-- Vertical Icons Wizard -->
    {{-- <div class="col-12 mb-4">
      <small class="text-light fw-medium">Vertical Icons</small>
      <div class="bs-stepper wizard-vertical vertical wizard-vertical-icons-example mt-2">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details-vertical">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Account Details</span>
                <span class="bs-stepper-subtitle">Setup Account Details</span>
              </span>
            </button>
          </div>
          <div class="line"></div>
          <div class="step" data-target="#personal-info-vertical">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-user"></i>
              </span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Personal Info</span>
                <span class="bs-stepper-subtitle">Add personal info</span>
              </span>
            </button>
          </div>
          <div class="line"></div>
          <div class="step" data-target="#social-links-vertical">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bxl-instagram"></i>
              </span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Social Links</span>
                <span class="bs-stepper-subtitle">Add social links</span>
              </span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <form onSubmit="return false">
            <!-- Account Details -->
            <div id="account-details-vertical" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Account Details</h6>
                <small>Enter Your Account Details.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="username1">Username</label>
                  <input type="text" id="username1" class="form-control" placeholder="john.doe" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="email1">Email</label>
                  <input type="text" id="email1" class="form-control" placeholder="john.doe" aria-label="john.doe" />
                </div>
                <div class="col-sm-6 form-password-toggle">
                  <label class="form-label" for="password60">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password60" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password6" />
                    <span class="input-group-text cursor-pointer" id="password6"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="col-sm-6 form-password-toggle">
                  <label class="form-label" for="confirm-password61">Confirm Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="confirm-password61" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="confirm-password7" />
                    <span class="input-group-text cursor-pointer" id="confirm-password7"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" disabled>
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info-vertical" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Personal Info</h6>
                <small>Enter Your Personal Info.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="first-name1">First Name</label>
                  <input type="text" id="first-name1" class="form-control" placeholder="John" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="last-name1">Last Name</label>
                  <input type="text" id="last-name1" class="form-control" placeholder="Doe" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="country1">Country</label>
                  <select class="select2" id="country1">
                    <option label=" "></option>
                    <option>UK</option>
                    <option>USA</option>
                    <option>Spain</option>
                    <option>France</option>
                    <option>Italy</option>
                    <option>Australia</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="language1">Language</label>
                  <select class="selectpicker w-auto" id="language1" data-style="btn-default" data-icon-base="bx" data-tick-icon="bx-check text-white" multiple>
                    <option>English</option>
                    <option>French</option>
                    <option>Spanish</option>
                  </select>
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- Social Links -->
            <div id="social-links-vertical" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Social Links</h6>
                <small>Enter Your Social Links.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="twitter1">Twitter</label>
                  <input type="text" id="twitter1" class="form-control" placeholder="https://twitter.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="facebook1">Facebook</label>
                  <input type="text" id="facebook1" class="form-control" placeholder="https://facebook.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="google1">Google+</label>
                  <input type="text" id="google1" class="form-control" placeholder="https://plus.google.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="linkedin1">Linkedin</label>
                  <input type="text" id="linkedin1" class="form-control" placeholder="https://linkedin.com/abc" />
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-success btn-submit">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> --}}
    <!-- /Vertical Icons Wizard -->
  </div>

  <hr class="container-m-nx mb-5">
  @endsection
  @else
  @section('content')
    <!DOCTYPE html>
    <html>
    <head>
      <link href="/media/examples/link-element-example.css" rel="stylesheet" />

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
      <link rel="dns-prefetch" href="https://apc.codepen.io">
      <link href="http://www.w3.org/2001/tag/doc/namespaceState-2005-12-16">
      <title>Forbidden</title>
      <style>
        @import url("https://fonts.googleapis.com/css?family=Bungee");

      body {
        background: #070612;
        color: white;
        font-family: "Bungee", cursive;
        margin-top: 50px;
        text-align: center;
      }
      a {
        color: darkred;
        text-decoration: none;
      }
      a:hover {
        color: white;
      }
      svg {
        width: 50vw;
      }
      .lightblue {
        fill: #070612;
      }
      .eye {
        cx: calc(115px + 30px * var(--mouse-x));
        cy: calc(50px + 30px * var(--mouse-y));
      }
      #eye-wrap {
        overflow: hidden;
      }
      .error-text {
        font-size: 120px;
      }
      .alarm {
        animation: alarmOn 0.5s infinite;
      }

      @keyframes alarmOn {
        to {
          fill: darkred;
        }
      }

      </style>
    </head>
    <body>
      <center>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="robot-error" viewBox="0 0 260 118.9" role="img">
          <title xml:lang="en">403 Error</title>
          <!-- Add the rest of your SVG content here -->
          <defs>
            <clipPath id="white-clip">
              <circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="30" />
              <text id="text-s" class="error-text" y="106"> 403 </text>
            </clipPath>
          </defs>
          <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
          <use xlink:href="#text-s" x="-0.5px" y="-1px" fill="black"></use>
          <use xlink:href="#text-s" fill="#2b2b2b"></use>
          <g id="robot">
            <g id="eye-wrap">
              <use xlink:href="#white-eye"></use>
              <circle id="eyef" class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
              <ellipse id="white-eye" fill="#070612" cx="130" cy="40" rx="20" ry="12" />
            </g>
            <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
            <use xlink:href="#tornillo" x="50"></use>
            <use xlink:href="#tornillo" x="50" y="60"></use>
            <use xlink:href="#tornillo" y="60"></use>
          </g>
        </svg>
        <h1>403</h1>
        <h1>You are not allowed to enter here</h1>
        <h2>Go <a target="_blank" href="/">Home!</a></h2>
      </center>
    </body>

    <script>
      var root = document.documentElement;
      var eyef = document.getElementById('eyef');
      var cx = document.getElementById("eyef").getAttribute("cx");
      var cy = document.getElementById("eyef").getAttribute("cy");

      document.addEventListener("mousemove", evt => {
        let x = evt.clientX / innerWidth;
        let y = evt.clientY / innerHeight;

        root.style.setProperty("--mouse-x", x);
        root.style.setProperty("--mouse-y", y);

        cx = 115 + 30 * x;
        cy = 50 + 30 * y;
        eyef.setAttribute("cx", cx);
        eyef.setAttribute("cy", cy);

      } );

      document.addEventListener("touchmove", touchHandler => {
        let x = touchHandler.touches[0].clientX / innerWidth;
        let y = touchHandler.touches[0].clientY / innerHeight;

        root.style.setProperty("--mouse-x", x);
        root.style.setProperty("--mouse-y", y);
      });
    </script>
    </html>

  @endsection
@endif
