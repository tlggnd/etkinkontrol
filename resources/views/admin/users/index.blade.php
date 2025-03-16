@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Kullanıcı Yönetimi</h6>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Yeni Kullanıcı Ekle</a>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>E-posta</th>
                                        <th>Yönetici</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->is_admin ? 'Evet' : 'Hayır' }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                                @if ($user->id !== Auth::id())
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
                                                    </form>
                                                @endif
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
    </div>
@endsection