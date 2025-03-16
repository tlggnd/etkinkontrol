<li class="list-group-item d-flex justify-content-between align-items-center main-menu" data-id="{{ $menu->id }}">
    <span class="handle"><i class="fas fa-grip-vertical"></i></span>
    <div style="width: 100%;">
        <strong>{{ $menu->name }}</strong>
         @if($menu->url)
            <small>(<a href="{{ $menu->url }}" target="_blank">Link</a>)</small>
        @endif
        @if($menu->children->isNotEmpty())
            <ul class="list-group mt-2 submenu-sortable" data-parent="{{ $menu->id }}">
                @foreach ($menu->children as $child)
                    @include('admin.menus.partials.menu-item', ['menu' => $child])
                @endforeach
            </ul>
        @endif
    </div>
    <span>
        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
        <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
        </form>
    </span>
</li>