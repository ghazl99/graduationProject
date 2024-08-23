@extends('layouts/layoutMaster')

@section('title', 'eCommerce Customer All - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-customer-all.js')}}"></script>
@endsection
@php
$role = ['المشرف', 'موظف إدارة الشحن'];
@endphp
@if (Auth::user()->hasRole($role))

  @section('content')


    <div class="row g-4 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <div class="d-flex align-items-end mt-2">
                  <h3 class="mb-0 me-2" id="userCount">{{$totalUser}}</h3>
                </div>
                <small>العدد الكلي للعملاء</small>
              </div>
              <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <div class="d-flex align-items-end mt-2">
                  <h3 class="mb-0 me-2" id="userVerifiedCount">{{$verified}}</h3>
                </div>
                <small>العدد الكلي للعملاء المتحقق منهم </small>
              </div>
              <span class="badge bg-label-success rounded p-2">
                <i class="bx bx-user-check bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- customers List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top" id="table">
          <thead>
            <tr>
              <th></th>
              <th>التسلسل</th>
              <th>اسم المستخدم</th>
              <th>الإيميل</th>
              <th>التحقق</th>
              <th>الدور</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
        </table>
      </div>


      <!-- Offcanvas to add new user -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasAddUserLabel" class="offcanvas-title">إضافة عميل</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
          <form class="add-new-user pt-0" id="addNewUserForm">
            <input type="hidden" name="id" id="user_id">
            <div class="mb-3">
              <label class="form-label" for="add-user-fullname">الاسم الكامل</label>
              <input type="text" class="form-control" id="add-user-fullname" placeholder="الاسم و الكنية" name="name" aria-label="John Doe" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="add-user-email">الإيميل</label>
              <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="add-user-contact">رقم الهاتف المحمول</label>
              <input type="text" id="contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="contact" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">كلمة السر</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-label="jdoe1" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="password-confirm">تأكيد كلمة السر</label>
              <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            </div>

            <div class="mb-3">
              <div class="d-flex flex-wrap row gx-4 row gap-2">
                <div class="form-check me-3 me-lg-5 item col">
                    <input class="form-check-input " type="checkbox"id="addCheckbox"  name="types[]" value="{{$roles->name}}"/>
                    <label class="form-check-label" for="userManagementRead">
                        {{$roles->name}}
                    </label>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">إرسال</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إلفاء</button>
          </form>
        </div>
      </div>

    <!-- Offcanvas to edit new user -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasEditUserLabel" class="offcanvas-title">تعديل بيانات العميل</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
            <form class="add-new-user pt-0" id="editNewUserForm">
              <input type="text" hidden name="id" id="edit_id">
              <div class="mb-3">
                <label class="form-label" for="add-user-fullname">الاسم الكامل</label>
                <input type="text" class="form-control" id="edit-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="add-user-email">الايميل</label>
                <input type="text" id="edit-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="add-user-contact">الرقم</label>
                <input type="text" id="edit-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="contact" />
              </div>
              <div class="mb-3">
                <div class="d-flex flex-wrap row gx-4 row gap-2">
                  <div class="form-check me-3 me-lg-5 item col">
                      <input class="form-check-input " type="checkbox"id="editCheckbox"  name="types[]" value="{{$roles->name}}"/>
                      <label class="form-check-label" for="userManagementRead">
                          {{$roles->name}}
                      </label>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">تأكيد</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إلغاء</button>
            </form>
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

