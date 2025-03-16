@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title mb-4">Menü Düzenle</h6>
                    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Menü Adı</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $menu->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Üst Menü (Opsiyonel)</label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">Ana Menü (Üst Menü Yok)</option>
                                @foreach ($menus as $parentMenu)
                                    <option value="{{ $parentMenu->id }}" {{ $menu->parent_id == $parentMenu->id ? 'selected' : '' }}>{{ $parentMenu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Menüyü Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
