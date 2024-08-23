@extends('layouts/layoutMaster')

@section('title', 'Add - Invoice')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />

@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/offcanvas-send-invoice.js')}}"></script>
<script src="{{asset('assets/js/app-invoice-add.js')}}"></script>
@endsection

@section('content')
<form onSubmit="return false" class="invoices-form" id="invoice_add">
<div class="row ">
  <!-- Invoice Add-->

  <div class="col-lg-9 col-12 mb-lg-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-md-6 mb-md-0 mb-4">
            <div class="d-flex svg-illustration mb-4 gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span>

            </div>
            <p class="mb-1">مكتب حلب,222,149 </p>
            <p class="mb-1">حلب ,الجميلية, CA 91905, سوريا</p>
            <p class="mb-0">+963 (123) 456 7891, 021 (876) 543 2198</p>
            <div class="">
            <?php
            use Picqer\Barcode\BarcodeGeneratorHTML;

            $generator = new BarcodeGeneratorHTML();
            $barcode = $generator->getBarcode($uniqueId, $generator::TYPE_CODE_128);

            echo '<div class="barcode">' . $barcode . '</div>';
            ?>
          </div>
          </div>

          <div class="col-md-6">



            <dl class="row mb-2">
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                <span class="h4 text-capitalize mb-0 text-nowrap">فاتورة #</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end">
                <div class="w-px-150">
                  <input type="number" hidden value="{{$shipment->request_id}}" name="request_id" id="request_id">
                  <input type="text" class="form-control" name="invoice_id"  value="{{$uniqueId}}" id="invoiceId" />
                </div>
              </dd>
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                <span class="fw-normal">التاريخ:</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end">
                <div class="w-px-150">
                  <input type="text" class="form-control date-picker" id="invoice_date" name="invoice_date" placeholder="YYYY-MM-DD" />
                </div>
              </dd>
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                <span class="fw-normal">التاريخ الفعلي  :</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end">
                <div class="w-px-150">
                  <input type="text" class="form-control date-picker" id="due_date"  name="due_date" placeholder="YYYY-MM-DD" />
                </div>
              </dd>
            </dl>
          </div>
        </div>

        <hr class="my-4 mx-n4" />

        <div class="row p-sm-3 p-0">
          <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
            <h5 class="pb-2">المرسل :</h5>

            <table>
              <tbody>

                <tr>
                  <th class="pe-3">الاسم الثلاثي :</th>
                  <td>{{$shipment->sender->first_name}} {{$shipment->sender->middle_name}} {{$shipment->sender->last_name}}</td>

                </tr>
                <tr>
                  <th class="pe-3">الهاتف:</th>
                  <td>{{$shipment->sender->phone}}</td>
                </tr>
                <tr>
                  <th class="pe-3">العنوان:</th>
                  <td>{{$shipment->sender->address}}</td>
                </tr>
                <tr>
                  <th class="pe-3">الايميل :</th>
                  <td>{{$shipment->sender->email}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6 col-sm-7">
            <h5 class="pb-2">المرسل إليه:</h5>
            <table>
              <tbody>

                <tr>
                  <th class="pe-3">الاسم الثلاثي :</th>
                  <td>{{$shipment->receiver->first_name}} {{$shipment->receiver->middle_name}} {{$shipment->receiver->last_name}}</td>

                </tr>
                <tr>
                  <th class="pe-3">الهاتف:</th>
                  <td>{{$shipment->receiver->phone}}</td>
                </tr>
                <tr>
                  <th class="pe-3">العنوان:</th>
                  <td>{{$shipment->receiver->address}}</td>
                </tr>
                <tr>
                  <th class="pe-3">الايميل :</th>
                  <td>{{$shipment->receiver->email}}</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
        <div class="row p-sm-3 p-0">
          <h5>المصدر :</h5>
          <h5>{{$shipment->source->source}}</h5>

        <h5>الوجهة :</h5>
         <h5>{{$shipment->destination->destination}}</h5>
        </div>
        <hr class="mx-n4" />

        <div class=" py-sm-3">
          <div class="">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>الفئة</th>
                  <th>وصف الشحنة </th>
                  <th>الكمية</th>
                  <th>الوزن</th>
                  <th>الاجمالي</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lines as $line)
                <tr>
                  <td>{{ $line->categoryDetail->category->category_name }}</td>
                  <td>{{ $line->description }}</td>
                  <td>{{ $line->quantity }}</td>
                  <td>{{ $line->weight }}</td>
                  <td>{{ $line->quantity * $line->categoryDetail->price}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>

        <hr class="my-4 mx-n4" />

        <div class="row py-sm-3">
          <div class="col-md-6 mb-md-0 mb-3">
            <div class=" mb-3">

              <div class="mb-3 ms-4 ">
                <label for="selectpickerLiveSearch" class="form-label">جهة الدفع</label>
                <select id="selectpickerLiveSearch" name="payer" class="selectpicker w-100" data-style="btn-default" data-live-search="true">

                  <option  data-subtext="المرسل إليه" value="{{$shipment->receiver->first_name}} {{$shipment->receiver->middle_name}} {{$shipment->receiver->last_name}}" label=" ">{{$shipment->receiver->first_name}} {{$shipment->receiver->middle_name}} {{$shipment->receiver->last_name}}</option>
                  <option  data-subtext="المرسل" value="{{$shipment->sender->first_name}} {{$shipment->sender->middle_name}} {{$shipment->sender->last_name}}" label=" ">{{$shipment->sender->first_name}} {{$shipment->sender->middle_name}} {{$shipment->sender->last_name}}</option>

                </select>
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-md-0 mb-3">
            <div class="mb-3">
            <div class="mb-3 ms-4  ">

              <label class="form-label">   المجموع النهائي   :   </label>
               <input class="form-control " type="number" name="amount" id="amount" value="{{$total}}">
             </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <div class="row py-sm-3 justify-content-between d-flex">
          <div class="col-md-6 mb-md-0 mb-3">
            <p>جميع الحقوق محفوظة لشركة</p>

            <h6>اسم محرر الاشعار : {{ Auth::user()->name }}</h6>
            <h6>الايميل {{ Auth::user()->email }}</h6>
            <h6>رقم التواصل {{ Auth::user()->contact }}</h6>


          </div>
          <div class="col-md-6 mb-md-0 mb-3 justify-content-end d-flex">

            <div class="qrcode">
              {!! QrCode::size(120)->generate($uniqueId) !!}
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <!-- /Invoice Add-->

  <!-- Invoice Actions -->
  <div class="col-lg-3 col-12 invoice-actions">
    <div class="card mb-4">
      <div class="card-body">
         <button type="button" class="btn btn-primary d-grid w-100 mb-3 invoice_btn_submit">حفظ</button>
        <button class="btn btn-label-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-1"></i>ارسال الفاتورة</span>
        </button>
      </div>
    </div>

  </div>
  <!-- /Invoice Actions -->
</div>
</form>

<!-- Offcanvas -->
@include('_partials/_offcanvas/offcanvas-send-invoice')
<!-- /Offcanvas -->
@endsection
<style>
  .barcode {
    display: inline-block;
    background-color: #ffffff;
  padding: 10px;
  border: 1px solid #000000;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  font-family: Arial, sans-serif;
  font-size: 9px;
  color: #000000;
  height: 50px; /* Adjust the height as desired */


  }

  .qrcode {
    display: inline-block;
    margin-left: ;
    margin-right: 100px;
    background-color: #ffffff;
  padding: 5px;
  border-radius: 5px;

  border: 1px solid #000000;
  }
  </style>
