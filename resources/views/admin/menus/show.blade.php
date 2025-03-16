@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title mb-4">{{ $menu->name }} - Sayfalar</h6>
                    <a href="{{ route('admin.menus.pages.create', $menu->id) }}" class="btn btn-primary">Yeni Sayfa Ekle</a>
                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sayfa Başlığı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu->pages as $page)
                                    <tr>
                                        <td>{{ $page->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.menus.pages.edit', [$menu->id, $page->id]) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                            <form action="{{ route('admin.menus.pages.destroy', [$menu->id, $page->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
