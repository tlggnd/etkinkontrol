@extends('admin.layouts.app')

@section('content')
    <h1>{{ $menu->name }} - Yeni Sayfa Oluştur</h1>
    <form action="{{ route('admin.menus.pages.store', $menu->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Sayfa Oluştur</button>
    </form>
@endsection
