@php
  $configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product Category - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-ecommerce.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.3.min.js">

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-category-list.js')}}"></script>
@endsection
@php
$roles = ['المشرف', 'موظف خدمات'];
@endphp
@if (Auth::user()->hasRole($roles))
  @section('content')

    <div class="col-xl-4 col-lg-6 col-md-6"id="cardsContainer">
      <div class="card h-100">
        <div class="row h-100">
          <div class="col-sm-5">
            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
              <div class="col-sm-7">
                  <button data-bs-target="#addModal" data-bs-toggle="modal" class="btn btn-primary mb-3 text-nowrap add-new-role">إضافة صنف جديد</button>
              </div>
            </div>
          </div>
          <div class="col-sm-7">
            <div class="card-body text-sm-end text-center ps-sm-0">
              <img src="{{asset('assets/img/illustrations/sitting-girl-with-laptop-'.$configData['style'].'.png')}}" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    {{-- show category --}}
    <div class="row g-4 " id="categories">
      @foreach ($categories as $category)
        <div class="col-xl-4 col-lg-6 col-md-6 ">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/img/category/'.$category->photo)}}" class="img-fluid mx-auto my-4 rounded" style="width: 500px; height: 300px;" alt="...">
              <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                  <h5 class="card-title text-center">{{$category->category_name}}</h5>

                  <a href="javascript:;"  data-bs-target="#editModal"  class="category-edit-modal" data-id={{$category->category_id}} data-bs-toggle="modal" ><small>تعديل الصنف</small></a>
                </div>
                <a href="javascript:void(0);" data-id={{$category->category_id}} class="delete-record"><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <br>


      <!-- Add Category Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" >
      <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="role-title">إضافة صنف جديد :</h3>
            </div>
            <!-- Add role form -->
            <form id="addForm" class="row g-3" >
              <!-- Title -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">اسم الصنف</label>
                <input type="hidden" id="modalRoleId" name="modalRoleId">
                <input type="text" id="ecommerce-category-title" name="categoryTitle" class="form-control" placeholder="أدخل اسم الصنف" tabindex="-1" />
              </div>
              <!-- Image -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">صورة الصنف</label>
                <input type="file" id="ecommerce-category-image" name="img" class="form-control" placeholder="" tabindex="-1" />
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" >إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
            <!--/ Add role form -->
          </div>
        </div>
      </div>
    </div>

    <!-- edit Category Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" >
      <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="role-title">تعديل الصنف</h3>
            </div>
            <form id="editForm" class="row g-3" >
              <!-- Title -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">اسم الصنف</label>
                <input type="hidden" id="editId" name="editId">
                <input type="text" id="Etitle" name="categoryTitle" class="form-control" placeholder="Enter a category name" tabindex="-1" />
              </div>
              <!-- Image -->
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">صورة الصنف</label>
                <input type="file" id="Eimage" name="img" class="form-control" placeholder="Enter category image" tabindex="-1" />
              </div>

              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" >إرسال</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
              </div>
            </form>
            <!--/ Add role form -->
          </div>
        </div>
      </div>
    </div>

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

