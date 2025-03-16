@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Etkinlik Kayıtları</h6>
                    </div>

                    {{-- Filtreleme Formu --}}
                    <form action="{{ route('admin.activity-logs.index') }}" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="user_id" class="form-label">Kullanıcı:</label>
                                <select name="user_id" id="user_id" class="form-select">
                                    <option value="">Tümü</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="model_type" class="form-label">Model:</label>
                                <select name="model_type" id="model_type" class="form-select">
                                    <option value="">Tümü</option>
                                    @foreach($modelTypes as $modelType)
                                        <option value="{{ $modelType }}" {{ request('model_type') == $modelType ? 'selected' : '' }}>{{ $modelType }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="action" class="form-label">İşlem:</label>
                                <select name="action" id="action" class="form-select">
                                    <option value="">Tümü</option>
                                    <option value="create" {{ request('action') == 'create' ? 'selected' : '' }}>Oluşturma</option>
                                    <option value="update" {{ request('action') == 'update' ? 'selected' : '' }}>Güncelleme</option>
                                    <option value="delete" {{ request('action') == 'delete' ? 'selected' : '' }}>Silme</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-4">Filtrele</button>
                                <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-secondary mt-4">Temizle</a>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kullanıcı</th>
                                    <th>Model</th>
                                    <th>İşlem</th>
                                    <th>Özet</th>
                                    <th>Tarih</th>
                                    <th>Detaylar</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($activityLogs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->user?->name ?? 'Sistem' }}</td>
                                    <td>{{ $log->model_name }} (ID: {{ $log->model_id }})</td>
                                     <td>
                                        @if ($log->action === 'create')
                                            <span class="badge bg-success">Oluşturuldu</span>
                                        @elseif ($log->action === 'update')
                                             <span class="badge bg-warning">Güncellendi</span>
                                        @elseif ($log->action === 'delete')
                                             <span class="badge bg-danger">Silindi</span>
                                        @else
                                             <span class="badge bg-secondary">{{ ucfirst($log->action) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Özet Bilgisi (GÜNCELLENDİ) --}}
                                        @if($log->user)
                                            {{ $log->user->name }},
                                        @else
                                            Sistem,
                                        @endif

                                        @if ($log->action === 'create')
                                             {{ $log->model_name }} oluşturdu.
                                        @elseif ($log->action === 'update')
                                            @if($log->model_name === 'User' && isset($log->new_values['name']))
                                                {{ $log->new_values['name'] }} adlı kullanıcıyı güncelledi.
                                            @elseif($log->model_name === 'User' && $log->model_id)
                                                 {{-- Eğer model User ise ve model_id varsa, veritabanından kullanıcıyı çek --}}
                                                @php
                                                    $affectedUser = \App\Models\User::find($log->model_id);
                                                @endphp
                                                @if($affectedUser)
                                                    {{ $affectedUser->name }} adlı kullanıcıyı güncelledi.
                                                @else
                                                     {{ $log->model_name }} (ID:{{$log->model_id}}) güncelledi.
                                                @endif
                                            @else
                                                {{ $log->model_name }} (ID:{{$log->model_id}}) güncelledi.
                                            @endif
                                        @elseif ($log->action === 'delete')
                                            @if($log->model_name === 'User' && $log->model_id)
                                                 {{-- Eğer model User ise ve model_id varsa, veritabanından kullanıcıyı çek --}}
                                                @php
                                                    $affectedUser = \App\Models\User::find($log->model_id);
                                                @endphp
                                                @if($affectedUser)
                                                    {{ $affectedUser->name }} adlı kullanıcıyı sildi.
                                                @else
                                                     {{ $log->model_name }} (ID:{{$log->model_id}}) sildi.
                                                @endif

                                            @else
                                              {{ $log->model_name }} (ID:{{$log->model_id}}) sildi.
                                            @endif
                                        @else
                                            {{ $log->model_name }} üzerinde işlem yaptı.
                                        @endif
                                    </td>
                                    <td>{{ $log->created_at->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.activity-logs.show', $log) }}" class="btn btn-sm btn-info">Detaylar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Kayıt bulunamadı.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                     {{ $activityLogs->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection