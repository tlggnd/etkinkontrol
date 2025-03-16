@extends('admin.layouts.app') {{-- Layout dosyanızın yolu --}}

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                        <h5 class="card-title">Slider Detayları</h5>
                    </div>
                <div class="row">
                    <div class="col-md-4">
                          <img src="{{ Storage::url($slider->image) }}" class="img-fluid" alt="{{ $slider->title }}">
                    </div>
                    <div class="col-md-8">

                        <div class="card-body">

                             <p><strong>ID:</strong> {{ $slider->id }}</p>

                            <p><strong>Başlık:</strong>
                                @if($slider->title_active)
                                    {{ $slider->title }}
                                @else
                                    <span class="text-muted">(Başlık Pasif)</span>
                                @endif
                            </p>
                            <p><strong>Alt Başlık:</strong>
                                @if($slider->subtitle_active)
                                    {{ $slider->subtitle }}
                                    @else
                                      <span class="text-muted">(Altbaşlık Pasif)</span>
                                @endif
                            </p>
                            <p><strong>Buton Metni:</strong>
                                @if($slider->button_active)
                                   {{ $slider->button_text }}
                                @else
                                   <span class="text-muted">(Buton Pasif)</span>
                                @endif
                            </p>
                            <p><strong>Buton Rengi:</strong>  <span style="background-color:{{$slider->button_color}}; color: white; padding: 2px 5px; border-radius: 3px;">{{ $slider->button_color }}</span></p>
                            <p><strong>Buton Linki:</strong>  @if($slider->button_link) <a href="{{$slider->button_link}}" target="_blank">{{$slider->button_link}}</a> @else <span class="text-muted">Yok</span> @endif</p>



                            <p><strong>Sıra:</strong> {{ $slider->order }}</p>
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-warning">Düzenle</a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection