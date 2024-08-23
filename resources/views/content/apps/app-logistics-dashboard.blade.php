@extends('layouts/layoutMaster')

@section('title', 'Logistics Dashboard - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />



@endsection

@section('page-style')



<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-logistics-dashboard.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">

<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

@endsection

@section('vendor-script')

<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>








<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>

<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>


@endsection

@section('page-script')
<script src="{{asset('js/myform-wizard-icons-number.js')}}"></script>


<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
<script src="{{asset('assets/js/modal-add-car.js')}}"></script>

@endsection

@section('content')
<h4 class="py-3 mb-4">
  معلومات الخدمات اللوجستية:    </h4>

<script>

</script>
<!-- Card Border Shadow -->

<!--/ Card Border Shadow -->
<div class="row">
  <!-- Vehicles overview -->

  <!--/ Vehicles overview -->
  <!-- Shipment statistics-->

  <!--/ Shipment statistics -->
  <!-- Delivery Performance -->

  <!--/ Delivery Performance -->
  <!-- Reasons for delivery exceptions -->

  <!--/ Reasons for delivery exceptions -->
  <!-- Orders by Countries -->

  <!--/ Orders by Countries -->
  <!-- On route vehicles Table -->

  <div class="col-12 order-5">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">الشاحنات</h5>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserLogistec"> +اضافة شاحنة </button>

      </div>
      <div class="card-datatable table-responsive">
        <table class="dt-route-vehicles table">
          <thead class="border-top">
            <tr>
              <th></th>
              <th>id</th>
              <th>رقم اللوحة</th>
              <th>رقم الشاسيه  </th>
              <th>نوع السيارة </th>
              <th>اللون</th>
              <th> ارتفاع السيارة </th>
              <th>طول السيارة</th>
              <th>سنة الصنع </th>
              <th>حالة السيارة</th>
              <th>الاجرائات </th>


            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <!-- Vehicles overview -->

  <!--/ Vehicles overview -->
  <!-- Shipment statistics-->

  <!--/ Shipment statistics -->
  <!-- Delivery Performance -->

  <!--/ Delivery Performance -->
  <!-- Reasons for delivery exceptions -->

  <!--/ Reasons for delivery exceptions -->
  <!-- Orders by Countries -->

  <!--/ Orders by Countries -->
  <!-- On route vehicles Table -->

  <div class="col-12 order-5 my-5">
    <div class="col-12 mb-4">
      <h5 class="text-black fw-medium">انشاء رحلة شحن</h5>
      <div class="bs-stepper wizard-vertical vertical mt-2">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details-1">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">1</span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">تفاصيل الرحلة</span>
                <span class="bs-stepper-subtitle">اضبط تفاصيل الرحلة</span>
              </span>
            </button>
          </div>
          <div class="line"></div>
          <div class="step" data-target="#personal-info-1">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">2</span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">وجهة الرحلة</span>
                <span class="bs-stepper-subtitle">ادخل وجهة الرحلة</span>
              </span>
            </button>
          </div>
          <div class="line"></div>
          <div class="step" data-target="#social-links-1">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">3</span>
              <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">المراجعة والتدقيق</span>

              </span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <form onSubmit="return false">
            <!-- Account Details -->
            <div id="account-details-1" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">تفاصيل الرحلة</h6>
                <small>ادخل تفاصيل الرحلة</small>
              </div>
              <div class="row g-3">

                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="select2Multiple" class="form-label">اختر الشحنات</label>
                    <select id="select2Multiple" class="select2 form-select" multiple>
                      @foreach ($s as $item)

                      <option value="">{{$item->source_id}}</option>
                      @endforeach

                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="selectpickerLiveSearch" class="form-label">اختر السائق</label>
                    <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                      <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>

                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="selectpickerLiveSearch" class="form-label">اختر المركبة</label>
                    <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                      <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>

                    </select>
                  </div>
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
            <div id="personal-info-1" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">وجهة الرحلة</h6>
                <small>ادخل معلومات وجهة الشحنة</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="selectpickerLiveSearch" class="form-label">اختر وجهة الوصول</label>
                    <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                      <option data-tokens="ketchup mustard">دمشق </option>
                      <option data-tokens="ketchup mustard">دمشق </option>
                      <option data-tokens="ketchup mustard">دمشق </option>
                      <option data-tokens="ketchup mustard">دمشق </option>


                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="selectpickerLiveSearch" class="form-label">اختر وجهة الانطلاق</label>
                    <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                      <option data-tokens="ketchup mustard">حلب </option>
                      <option data-tokens="ketchup mustard">حلب </option>
                      <option data-tokens="ketchup mustard">حلب </option>
                      <option data-tokens="ketchup mustard">حلب </option>

                    </select>
                  </div>
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
            <div id="social-links-1" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">المراجعة والتدقيق</h6>

              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="linkedin-vertical">LinkedIn</label>
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
    </div>
    </div>
</div>
<!--/ On route vehicles Table -->
@include('_partials/_modals/modal-car-logistec')

@endsection
