<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
        <div class="mb-3">
            @if(Auth::user()->profile_photo_path)
                <img class="w-80px h-80px rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profil Resmi">
            @else
                <img class="w-80px h-80px rounded-circle" src="{{ asset('admin/assets/images/no-profile.webp') }}" alt="Varsayılan Profil Resmi">
            @endif
        </div>
        <div class="text-center">
            <p class="fs-16px fw-bolder">{{ Auth::user()->name }}</p>
            <p class="fs-12px text-secondary">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <ul class="list-unstyled p-1">
        <li>
            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item d-flex align-items-center py-2">
                <i class="mdi mdi-account-edit me-2"></i>
                <span>Profil Düzenle</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center py-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout me-2"></i>
                <span>Çıkış Yap</span>
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>