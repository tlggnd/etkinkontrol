@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title mb-4">Yeni Menü Oluştur</h6>
                    <form action="{{ route('admin.menus.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Menü Adı</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Üst Menü (Opsiyonel)</label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">Ana Menü (Üst Menü Yok)</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Alt menüleri gösterme -->
                        <div class="form-group mt-4">
                            <label>Alt Menüleri Göster</label>
                            <ul>
                                @foreach ($menus as $menu)
                                    <li>
                                        <strong>{{ $menu->name }}</strong>
                                        @if ($menu->children->count() > 0)
                                            <ul>
                                                @foreach ($menu->children as $child)
                                                    <li>{{ $child->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span>(Alt Menü Yok)</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Menü Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
