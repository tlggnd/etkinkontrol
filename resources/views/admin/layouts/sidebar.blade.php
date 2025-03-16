<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand" >
        UZMAN
        </a>
        <div class="sidebar-toggler">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav" id="sidebarNav">
          
        <div class="sidebar-button">
                <a href="{{route('home')}}" target="_blank" class="sidebar-button-link">
                    <button type="button" class="btn btn-primary">
                        <i class="link-icon xs" data-feather="external-link"></i>
                        <span class="button-text">Siteye Git</span>
                    </button>
                </a>
            </div>
            <div class="sidebar-button mt-2">
                <a href="{{route('admin.dashboard')}}" class="sidebar-button-link">
                    <button type="button" class="btn btn-danger">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="button-text">Ana Sayfa</span>
                    </button>
                </a>
            </div>
          
          <li class="nav-item nav-category">SİTE YÖNETİMİ</li>
          
          <li class="nav-item">
            <a href="{{route('admin.settings.index')}}" class="nav-link">
              <i class="link-icon" data-feather="settings"></i>
              <span class="link-title">Genel Ayarlar</span>
            </a>
          </li>
          <li class="nav-item">
        <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="flag"></i>
            <span class="link-title">Dil Yönetimi</span>
            <span class="badge badge-danger ml-2" style="color:brown">Yakında</span>
        </a>
    </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">Tema Yönetimi</span>
              <span class="badge badge-danger ml-2" style="color:brown">Yakında</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.performance-settings.index') }}" class="nav-link">
              <i class="link-icon" data-feather="activity"></i>
              <span class="link-title">Performans Ayarları</span>
            </a>
          </li>
        

          <li class="nav-item nav-category">KULLANICI YÖNETİMİ</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Kullanıcı Yönetimi</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.activity-logs.index') }}" class="nav-link">
              <i class="link-icon" data-feather="clock"></i>
              <span class="link-title">Kullanıcı Logları </span>
            </a>
          </li>
          

          <li class="nav-item nav-category">İÇERİK YÖNETİMİ</li>
          <li class="nav-item">
            <a href="{{ route('admin.sliders.index') }}" class="nav-link">
              <i class="link-icon" data-feather="image"></i>
              <span class="link-title">Slider Yönetimi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="briefcase"></i>
              <span class="link-title">Kurumsal Yönetim</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.menus.index') }}" class="nav-link">
              <i class="link-icon" data-feather="menu"></i>
              <span class="link-title">Menü Yönetimi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="file"></i>
              <span class="link-title">Sayfa Yönetimi</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">EKSTRA UYGULAMALAR</li>
          
          
         
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title"></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>