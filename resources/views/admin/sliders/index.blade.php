@extends('admin.layouts.app') {{-- Layout dosyanızın yolu --}}

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Slider Listesi</h6>
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Yeni Slider Ekle</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover" id="sliders-table"> {{-- table-hover ve id eklendi --}}
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Resim</th>
                                <th>Başlık</th>
                                <th>Alt Başlık</th>
                                <th>Buton Metni</th>
                                <th>Sıra</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sliders as $slider)
                                <tr data-id="{{ $slider->id }}">
                                    <td>{{ $slider->id }}</td>
                                    <td>
                                        <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}" style="max-width: 100px; height: auto;"> {{-- Stil eklendi --}}
                                    </td>
                                     <td>
                                        @if($slider->title_active)
                                            {{ $slider->title }}
                                        @else
                                            <span class="text-muted">(Başlık Pasif)</span>
                                        @endif
                                    </td>
                                    <td>
                                         @if($slider->subtitle_active)
                                            {{ $slider->subtitle }}
                                        @else
                                            <span class="text-muted">(Altbaşlık Pasif)</span>
                                        @endif
                                    </td>
                                    <td>
                                         @if($slider->button_active)
                                            {{ $slider->button_text }}
                                        @else
                                            <span class="text-muted">(Buton Pasif)</span>
                                        @endif
                                    </td>
                                    <td class="order">{{ $slider->order }}</td>
                                    <td>
                                        <a href="{{ route('admin.sliders.show', $slider) }}" class="btn btn-sm btn-info">Göster</a> {{-- btn-sm eklendi --}}
                                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-warning">Düzenle</a> {{-- btn-sm eklendi --}}
                                        <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button> {{-- btn-sm eklendi --}}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Kayıt bulunamadı.</td> {{-- colspan güncellendi --}}
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {

            // AJAX isteği ile sıralamayı güncelle
            function updateOrder() {
                let order = [];
                $('#sliders-table tbody tr').each(function() {
                    order.push($(this).data('id'));
                });

                $.ajax({
                    url: "{{ route('admin.sliders.updateOrder') }}",
                    type: "POST",
                    data: {
                        order: order,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            // Başarılı işlem
                            // console.log(response.message); // İsterseniz bir toast mesajı gösterebilirsiniz.
                            // Sıralamayı güncelle (DOM'da) - GEREKLİ, çünkü sayfa yenilenmiyor.
                            $('#sliders-table tbody tr').each(function(index) {
                                $(this).find('.order').text(index + 1);
                            });

                              // Toastr bildirimini göster
                                toastr.success(response.message, 'Başarılı!');


                        } else {
                            // Hata
                            console.error(response.message);
                             toastr.error(response.message, 'Hata!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Bir hata oluştu: " + error);
                         toastr.error("Bir hata oluştu: " + error, 'Hata!');
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            console.error("Hata mesajı:", xhr.responseJSON.message);
                             toastr.error(xhr.responseJSON.message, 'Hata!');
                        }
                    }
                });
            }

            // Sürükle bırak ile sıralama
            $("#sliders-table tbody").sortable({
                update: function(event, ui) {
                    updateOrder();
                }
            });
        });

    </script>

    @endpush