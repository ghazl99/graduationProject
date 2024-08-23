@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-product-list.js')}}"></script>
@endsection

@php
$roles = ['المشرف', 'موظف خدمات'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')
    <h4 class="py-3 mb-4">
      معلومات أجور الشحن:    </h4>

    <!-- Product List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-products table border-top">
          <thead>
            <tr>
              <th></th>
              <th>التسلسل</th>
              <th>الصنف</th>
              <th>نوع الطرد</th>
              <th>الوزن</th>
              <th>السعر</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <!-- Add product Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3> إضافة نوع طرد جديد</h3>
            </div>
            <form id="addForm" class="row">
              {{-- category --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name"> الصنف</label>
                <select id="category-org" class="form-select" data-placeholder="اختر صنف" name="category_id">
                  <option value="">اختر نوع الصنف</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- name --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name">اسم الطرد</label>
                <input type="text" class="form-control" id="ecommerce-product-name" placeholder="نوع الطرد" name="type" aria-label="Product title">
              </div>

              {{-- weight --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-sku">الوزن</label>
                <input type="text" class="form-control" id="ecommerce-product-sku" placeholder="ادخل الوزن" name="weight" aria-label="Product SKU">
              </div>

              {{-- price --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-barcode">السعر</label>
                <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="ادخل السعر" name="price" aria-label="Product barcode">
              </div>
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Add product Modal -->


    <!-- Edit product Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3> إضافة نوع طرد جديد</h3>
            </div>
            <input type="text" id="editId" name="editId" hidden/>
            <form id="editForm" class="row">
              {{-- category --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name"> الصنف</label>
                <select id="category" class="form-select" data-placeholder="اختر صنف" name="category_id">
                  <option value="" >اختر نوع الصنف</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- name --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-name">اسم الطرد</label>
                <input type="text" class="form-control" id="product-name" placeholder="نوع الطرد" name="type" aria-label="Product title">
              </div>

              {{-- weight --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-sku">الوزن</label>
                <input type="text" class="form-control" id="weight" placeholder="ادخل الوزن" name="weight" aria-label="Product SKU">
              </div>

              {{-- price --}}
              <div class="col-12 mb-4">
                <label class="form-label" for="ecommerce-product-barcode">السعر</label>
                <input type="text" class="form-control" id="price" placeholder="ادخل السعر" name="price" aria-label="Product barcode">
              </div>
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Edit product Modal -->
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
