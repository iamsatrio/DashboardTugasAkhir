<!-- ### $Topbar ### -->
<div class="header navbar">
  <div class="header-container">
    <ul class="nav-left">
      <li>
        <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
          <i class="ti-menu"></i>
        </a>
      </li>
    </ul>
    <ul class="nav-right">
      @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @else
      <li class="dropdown">
        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
          <div class="peer mR-10">
            <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
          </div>
          <div class="peer">
            <h4 class="fsz-sm c-grey-900">{{ Auth::user()->name }}</h4>
          </div>
        </a>
        <ul class="dropdown-menu fsz-sm">
          <li>
            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-settings mR-10"></i>
              <span>Setting</span>
            </a>
          </li>
          <li>
            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-user mR-10"></i>
              <span>Profile</span>
            </a>
          </li>
          <li>
            <a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-email mR-10"></i>
              <span>Messages</span>
            </a>
          </li>
          <li role="separator" class="divider"></li>
          <li>
            <a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
            onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="ti-power-off mR-10"></i>
              <span>{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          @endguest
        </ul>
      </li>
    </ul>
  </div>
</div>
