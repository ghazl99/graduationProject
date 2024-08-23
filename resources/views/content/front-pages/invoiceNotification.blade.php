
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

@section('content')
<section id="hero-animation">
  <div id="landingHero" class="section-py landing-hero position-relative">
    <div class="container">
      <div class="hero-text-box text-center">
        <h1 class="text-primary hero-title display-4 fw-bold">الفاتورة</h1>
        <br>
      </div>
      {{-- show category --}}
      <center>
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
                </div>
                <div class="col-md-6">
                  <dl class="row mb-2">
                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                      <span class="h4 text-capitalize mb-0 text-nowrap">فاتورة #</span>
                    </dt>
                    <dd class="col-sm-6 d-flex justify-content-md-end">
                      <div class="w-px-150">
                        <input type="text" class="form-control" name="invoice_id"  value="{{$invoice->invoice_id}}" id="invoiceId" readonly />
                      </div>
                    </dd>
                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                      <span class="fw-normal">التاريخ:</span>
                    </dt>
                    <dd class="col-sm-6 d-flex justify-content-md-end">
                      <div class="w-px-150">
                        <input type="text" class="form-control date-picker" id="invoice_date" value="{{ $invoice->invoice_date }}"  readonly  />
                      </div>
                    </dd>
                    <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                      <span class="fw-normal">التاريخ الفعلي  :</span>
                    </dt>
                    <dd class="col-sm-6 d-flex justify-content-md-end">
                      <div class="w-px-150">
                        <input type="text" class="form-control date-picker" id="due_date" value="{{ $invoice->due_date}}"   readonly />
                      </div>
                    </dd>
                  </dl>
                </div>

              </div>

              <hr class="my-4 mx-n4" />

            </div>
            <div class="row p-sm-3 p-0">
              <div class="col-6">
                <h5>المصدر :</h5>
                <h6>{{$invoice->shippingRequest->source->source}}</h6>
              </div>
              <div class="col-6">
                <h5>الوجهة :</h5>
                <h6>{{$invoice->shippingRequest->destination->destination}}</h6>
              </div>

              <hr class="my-4 mx-n4" />

                <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
                  <h5 class="pb-2">المرسل:</h5>

                  <table>
                    <tbody>

                      <tr>
                        <th class="pe-3">الاسم الثلاثي :</th>
                        <td>{{$invoice->shippingRequest->sender->first_name}} {{$invoice->shippingRequest->sender->middle_name}} {{$invoice->shippingRequest->sender->last_name}}</td>

                      </tr>
                      <tr>
                        <th class="pe-3">الهاتف:</th>
                        <td>{{$invoice->shippingRequest->sender->phone}}</td>
                      </tr>
                      <tr>
                        <th class="pe-3">العنوان:</th>
                        <td>{{$invoice->shippingRequest->sender->address}}</td>
                      </tr>
                      <tr>
                        <th class="pe-3">الايميل :</th>
                        <td>{{$invoice->shippingRequest->sender->email}}</td>
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
                        <td>{{$invoice->shippingRequest->receiver->first_name}} {{$invoice->shippingRequest->receiver->middle_name}} {{$invoice->shippingRequest->receiver->last_name}}</td>

                      </tr>
                      <tr>
                        <th class="pe-3">الهاتف:</th>
                        <td>{{$invoice->shippingRequest->receiver->phone}}</td>
                      </tr>
                      <tr>
                        <th class="pe-3">العنوان:</th>
                        <td>{{$invoice->shippingRequest->receiver->address}}</td>
                      </tr>
                      <tr>
                        <th class="pe-3">الايميل :</th>
                        <td>{{$invoice->shippingRequest->receiver->email}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>




              <div class=" py-sm-3">
                <div class="">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>الفئة</th>
                        <th>وصف الشحنة </th>
                        <th>الوزن</th>
                        <th>الكمية</th>
                        <th>الاجمالي</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($invoice->shippingRequest->shipmentLines as $line)
                      <tr>
                        <td>{{ $line->categoryDetail->category->category_name }}</td>
                        <td>{{ $line->description }}</td>
                        <td>{{ $line->weight }}</td>
                        <td>{{ $line->quantity }}</td>
                        <td>{{ $line->categoryDetail->weight * $line->quantity * $line->categoryDetail->price}}</td>
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

                      <input type="text" class="form-control" name="invoice_id"  value="{{$invoice->payer}}" id="invoiceId" readonly />

                    </div>
                  </div>

                </div>
                <div class="col-md-6 mb-md-0 mb-3">
                  <div class="mb-3">
                  <div class="mb-3 ms-4  ">

                    <label class="form-label">   المجموع النهائي   :   </label>
                     <input class="form-control " type="number" name="amount" id="amount" value="{{ $invoice->amount }}">
                   </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <div class="row py-sm-3 justify-content-between d-flex">
                <div class="col-md-6 mb-md-0 mb-3">
                  <p>جميع الحقوق محفوظة لشركة</p>
                </div>
                <div class="col-md-6 mb-md-0 mb-3 justify-content-end d-flex">
                  <?php
                  use Picqer\Barcode\BarcodeGeneratorHTML;

                  $generator = new BarcodeGeneratorHTML();
                  $barcode = $generator->getBarcode($invoice->invoice_id, $generator::TYPE_CODE_128);

                  echo '<div class="barcode">' . $barcode . '</div>';
                  ?>
                  <div class="qrcode">
                    {!! QrCode::size(120)->generate($invoice->invoice_id) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Invoice Add-->

      </center>
    </div>
  </div>
</section>

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
      margin-left: 100px;
      margin-right: 100px;
      background-color: #ffffff;
    padding: 5px;
    border-radius: 5px;

    border: 1px solid #000000;
    }
  </style>
