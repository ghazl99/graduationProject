@php
  $currentRouteName = Route::currentRouteName();
  $activeRoutes = ['front-pages-pricing', 'front-pages-payment', 'front-pages-checkout', 'front-pages-help-center'];
  $activeClass = in_array($currentRouteName, $activeRoutes) ? 'active' : '';
@endphp
<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
      <!-- Menu logo wrapper: Start -->
      <div class="navbar-brand app-brand demo d-flex py-0 me-4">
        <!-- Mobile menu toggle: Start-->
        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
        </button>

      </div>
      <!-- Menu logo wrapper: End -->
      <!-- Menu wrapper: Start -->
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-x bx-sm"></i>
        </button>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium active " aria-current="page" href="{{url('/ ')}}">الصفحة الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium " href="{{ Route('categories') }}">الاستعلام</a>
          </li>

          <li class="nav-item">
            @php
                $roles = ['المشرف', 'موظف إدارة الشحن','موظف خدمات','موظف خدمات اللوجستية'];
            @endphp
            @if (Auth::check())
              @if (Auth::user()->hasRole($roles))
              <a class="nav-link fw-medium" href="{{url('/dashboard/analytics')}}" target="_blank">لوحة القيادة</a>
              @endif
            @endif
          </li>
          @if($configData['hasCustomizer'] == true)
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class='bx bx-sm'></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                    <span class="align-middle"><i class='bx bx-sun me-2'></i>فاتح</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                    <span class="align-middle"><i class="bx bx-moon me-2"></i>غامق</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                    <span class="align-middle"><i class="bx bx-desktop me-2"></i>وضع النظام</span>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar ">
                <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/Profile-PNG-Images.png') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              @if (Auth::check())
                <li>
                  <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/Profile-PNG-Images.png') }}" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-medium d-block">

                          {{ Auth::user()->name }}<br>
                          <small class="text-muted">{{ Auth::user()->getRoleNames()->first() }}</small>
                        </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
              @endif

                @if (Auth::check())
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-power-off me-2'></i>
                    <span class="align-middle">تسجيل الخروج</span>
                  </a>
                </li>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                  @csrf
                </form>
                @else
                <li>
                  <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : url('auth/login-basic') }}">
                    <i class='bx bx-log-in me-2'></i>
                    <span class="align-middle">تسجيل الدخول</span>
                  </a>
                </li>
                @endif
              </ul>
          </li>

        <!-- Notification -->
        @if (Auth::check())
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="bx bx-bell bx-sm"></i>
              @if ( Auth::user()->unreadNotifications->count())
              <span class="badge bg-danger rounded-pill badge-notifications" id="notificationCount">{{ Auth::user()->unreadNotifications->count()}}</span>
              @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0" id="notification">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">الإشعارات</h5>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container"> <!-- Added scrollable-container -->
                <ul class="list-group list-group-flush">
                  @foreach (Auth::user()->unreadNotifications as $notification)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item" style="background-color: gainsboro">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar">
                            <img src="{{asset('assets/img/category/'.$notification->data['photo'])}}" alt=""  class="rounded-circle" style="display: inline">
                          </div>
                        </div>
                        <a href="{{ Route($notification->data['link'],$notification->data['id'])}}">
                          <div class="flex-grow-1">
                            <h6 class="mb-1"><b>{{ $notification->data['title'] }} 🎉</b></h6>
                            <p class="mb-0">
                              <b> {{ $notification->data['paragraph'] }}</b>
                            </p>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                          </div>
                        </a>
                        <div class="flex-shrink-0 dropdown-notifications-actions">
                          <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                          <a href="javascript:void(0)" class="dropdown-notifications-archive delete-record" data-id={{$notification->data['id']}} ><span class="bx bx-x"></span></a>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </li>
              {{-- read notification --}}
              <li class="dropdown-notifications-list scrollable-container"> <!-- Added scrollable-container -->
                <ul class="list-group list-group-flush">
                  @foreach (Auth::user()->readNotifications as $notification)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar">
                            <img src="{{asset('assets/img/category/'.$notification->data['photo'])}}" alt=""  class="rounded-circle">
                          </div>
                        </div>
                        <a href="{{ Route($notification->data['link'],$notification->data['id'])}}">
                          <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $notification->data['title'] }} 🎉</h6>
                            <p class="mb-0">
                              {{ $notification->data['paragraph'] }}
                            </p>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                          </div>
                        </a>
                        <div class="flex-shrink-0 dropdown-notifications-actions">
                          <a href="javascript:void(0)" class="dropdown-notifications-archive delete-record" data-id={{$notification->data['id']}} ><span class="bx bx-x"></span></a>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li class="dropdown-menu-footer border-top p-3">
                <a href="{{ route('markRead') }}" class="btn btn-primary text-uppercase w-100">مشاهدة كل الإشعارات</a>
              </li>
            </ul>
          </li>
        @endif
        <!--/ Notification -->
        <!-- Style Switcher -->
        </ul>
      </div>
      <div class="landing-menu-overlay d-lg-none"></div>
      <!-- Menu wrapper: End -->
      <!-- Toolbar: Start -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">

        <li>
          <!-- Mobile menu toggle: End-->
          <a href="{{url('/')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">SwiftShip
            </span>
            <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
          </a>
        </li>
      </ul>
      <!-- Toolbar: End -->
    </div>
  </div>
</nav>
<!-- Navbar: End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).on('click', '.delete-record', function () {
    var role_id = $(this).data('id');
    //var dropdownMenu = $(this).closest('.dropdown-menu');
    var dropdownItem = $(this).closest('.dropdown-notifications-item');
    var badge = $('.badge-notifications');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Delete the data
    $.ajax({
        type: 'delete',
        url: '/categories-page/' + role_id,
        success: function (data) {
            dropdownItem.remove();
            // Update the notification count
            var newCount= 0;
            newCount = parseInt(badge.text()) - 1;
            badge.text(newCount);
            if (newCount == 0) {
                badge.hide();
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
  });

</script>
<style>
.scrollable-container {
  max-height: 200px; /* Adjust the max-height value as needed */
  overflow-y: auto;
}
</style>

