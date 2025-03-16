@extends('admin.layouts.app')

@section('title', 'Performans Ayarları')

@section('content')

<div class="row mt-5 pt-2">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                    <h6 class="card-title mb-0">Performans Ayarları</h6>
                </div>
                <div class="row align-items-start">
                    <div class="col-md-6">
                        <button id="clear-cache" class="btn btn-primary mb-2">Önbelleği Temizle</button>
                        <button id="config-cache" class="btn btn-primary mb-2">Konfigürasyonu Önbellekle</button>
                        <button id="route-cache" class="btn btn-primary mb-2">Rotaları Önbellekle</button>
                        <button id="view-cache" class="btn btn-primary mb-2">Görünümleri Önbellekle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#clear-cache, #config-cache, #route-cache, #view-cache').click(function() {
            var buttonId = $(this).attr('id');
            var url = '';

            switch (buttonId) {
                case 'clear-cache':
                    url = '{{ route('admin.performance-settings.cache-clear') }}';
                    break;
                case 'config-cache':
                    url = '{{ route('admin.performance-settings.config-cache') }}';
                    break;
                case 'route-cache':
                    url = '{{ route('admin.performance-settings.route-cache') }}';
                    break;
                case 'view-cache':
                    url = '{{ route('admin.performance-settings.view-cache') }}';
                    break;
            }

            $.post(url, { _token: '{{ csrf_token() }}' }, function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: response.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: response.message,
                    });
                }
            });
        });
    });
</script>
@endsection