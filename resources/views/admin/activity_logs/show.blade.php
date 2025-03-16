@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title mb-4">Etkinlik Kaydı Detayı (ID: {{ $activityLog->id }})</h6>
                    {{-- ... tablo içeriği ... --}}
                    <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-primary">Geri Dön</a> {{-- DÜZELTİLDİ --}}
                </div>
            </div>
        </div>
    </div>
@endsection