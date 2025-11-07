<header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-15">
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">
              <!-- profile start -->
<div class="profile-box ml-15">
  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
    data-bs-toggle="dropdown" aria-expanded="false">
    <div class="profile-info">
      <div class="info">
        <div class="image">
          <img src="{{ Auth::user()->profile
              ? asset('storage/' . Auth::user()->profile)
              : asset('assets/images/profile/profile-image.png') }}"
              alt="Profile" />
        </div>
        <div>
          <h6 class="fw-500">{{ Auth::user()->username ?? 'Guest' }}</h6>
          <p class="text-capitalize">{{ Auth::user()->role ?? '-' }}</p>
        </div>
      </div>
    </div>
  </button>

  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
    <li>
      <div class="author-info flex items-center !p-1">
        <div class="image">
          <img src="{{ Auth::user()->profile
              ? asset('storage/' . Auth::user()->profile)
              : asset('assets/images/profile/profile-image.png') }}"
              alt="image">
        </div>
        <div class="content">
          <h4 class="text-sm">{{ Auth::user()->username ?? 'Guest' }}</h4>
          <span
            class="text-nowrap text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs">
            {{ Auth::user()->email ?? '-' }}
          </span>
        </div>
      </div>
    </li>

    <li class="divider"></li>
    <li>
      <a href="{{ route('users.profile') }}">
        <i class="lni lni-user"></i> View Profile
      </a>
    </li>

    <li class="divider"></li>
    <li>
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="lni lni-exit"></i> Sign Out
      </a>
    </li>

    <div class="mt-4">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </ul>
</div>
<!-- profile end -->

            </div>
          </div>
        </div>
      </div>
    </header>

