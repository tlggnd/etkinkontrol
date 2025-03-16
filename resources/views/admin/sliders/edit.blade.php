@extends('admin.layouts.app') {{-- Layout dosyanızın yolu --}}

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Slider Düzenle</h6>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="image" class="form-label">Resim</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="image-preview" class="mt-2">
                                <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" class="img-thumbnail" style="max-width: 200px; height: auto;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $slider->title) }}">
                             @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="1" id="title_active" name="title_active" {{ $slider->title_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="title_active">
                                    Başlık Aktif
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Alt Başlık</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="1" id="subtitle_active" name="subtitle_active" {{ $slider->subtitle_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="subtitle_active">
                                    Alt Başlık Aktif
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="button_text" class="form-label">Buton Metni</label>
                            <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ old('button_text', $slider->button_text) }}">
                             @error('button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="button_color" class="form-label">Buton Rengi</label>
                             <input type="color" class="form-control form-control-color @error('button_color') is-invalid @enderror" id="button_color" name="button_color" value="{{ old('button_color', $slider->button_color) }}"> {{-- type="color" --}}
                               @error('button_color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="button_link" class="form-label">Buton Linki</label>
                            <input type="text" class="form-control @error('button_link') is-invalid @enderror" id="button_link" name="button_link" value="{{ old('button_link', $slider->button_link) }}">
                             @error('button_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="button_active" name="button_active" {{ $slider->button_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="button_active">
                                Buton Aktif
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
 // Resim önizlemesi
    document.getElementById('image').addEventListener('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let preview = document.getElementById('image-preview');
            preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px; height: auto;">';
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endpush