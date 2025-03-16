<nav class="navbar">
  <div class="navbar-content">
      <div class="logo-mini-wrapper">
          <img src="{{ asset('admin/assets/images/logo-mini-light.png') }}" class="logo-mini logo-mini-light" alt="logo">
          <img src="{{ asset('admin/assets/images/logo-mini-dark.png') }}" class="logo-mini logo-mini-dark" alt="logo">
      </div>
      <ul class="navbar-nav">
          <li class="theme-switcher-wrapper nav-item">
              <input type="checkbox" value="" id="theme-switcher">
              <label for="theme-switcher">
                  <div class="box">
                      <div class="ball"></div>
                      <div class="icons">
                          <i class="feather icon-sun"></i>
                          <i class="feather icon-moon"></i>
                      </div>
                  </div>
              </label>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @if(Auth::user()->profile_photo_path)
                      <img class="w-30px h-30px ms-1 rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="profile">
                  @else
                  <img class="w-30px h-30px ms-1 rounded-circle" src="{{ asset('admin/assets/images/no-profile.webp') }}" alt="Varsayılan Profil Resmi">

                  @endif
              </a>
              @include('admin.layouts.partials._profile_dropdown')
          </li>
      </ul>
      <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
      </a>
  </div>
</nav>