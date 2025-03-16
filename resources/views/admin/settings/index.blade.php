@extends('admin.layouts.app')

@section('title', 'Genel Ayarlar')

@section('content')

<div class="row mt-5 pt-2">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                    <h6 class="card-title mb-0">General Setting</h6>
                </div>
                <div class="row align-items-start">
                    <ul class="nav nav-tabs nav-tabs-line" id="settingsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="seo-tab" data-bs-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO Ayarları</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-tab" data-bs-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Logo Ayarları</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">İletişim Bilgileri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Sosyal Medya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="smtp-tab" data-bs-toggle="tab" href="#smtp" role="tab" aria-controls="smtp" aria-selected="false">SMTP Ayarları</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Footer Ayarları</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="settingsTabContent">

                        <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <form id="general-form" class="setting-form">
                                @csrf
                                <div class="mb-3">
                                    <label for="footerText" class="form-label">Footer Text</label>
                                    <textarea class="form-control" name="footer_text" id="footerText" rows="10">{{ $settings['footer_text'] ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="copyright" class="form-label">Copyright</label>
                                    <input type="text" class="form-control" id="copyright" name="copyright" value="{{ $settings['copyright'] ?? '' }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

                
                        
                        <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                            <form id="logo-form" class="setting-form" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <img id="dark_logo_preview" src="{{ asset('storage/' . ($settings['dark_logo'] ?? '')) }}" alt="Koyu Logo Önizleme" style="max-width: 150px; margin-bottom: 10px; display: block;">
                                    <label for="dark_logo" class="form-label">Koyu Logo</label>
                                    <input type="file" class="form-control" id="dark_logo" name="dark_logo">
                                </div>
                                <div class="mb-3">
                                    <img id="light_logo_preview" src="{{ asset('storage/' . ($settings['light_logo'] ?? '')) }}" alt="Açık Logo Önizleme" style="max-width: 150px; margin-bottom: 10px; display: block;">
                                    <label for="light_logo" class="form-label">Açık Logo</label>
                                    <input type="file" class="form-control" id="light_logo" name="light_logo">
                                </div>
                                <div class="mb-3">
                                    <img id="favicon_preview" src="{{ asset('storage/' . ($settings['favicon'] ?? '')) }}" alt="Favicon Önizleme" style="max-width: 50px; margin-bottom: 10px; display: block;">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <input type="file" class="form-control" id="favicon" name="favicon">
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

                        <div class="tab-pane fade show active" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                            <form id="seo-form" class="setting-form">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Site Başlığı</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $settings['title'] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Site Açıklaması</label>
                                    <textarea class="form-control" id="description" name="description">{{ $settings['description'] ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="keywords" class="form-label">Anahtar Kelimeler</label>
                                    <textarea class="form-control" id="keywords" name="keywords">{{ $settings['keywords'] ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="google_analytics" class="form-label">Google Analytics</label>
                                    <textarea class="form-control" id="google_analytics" name="google_analytics">{{ $settings['google_analytics'] ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <form id="contact-form" class="setting-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Telefon</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings['phone'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gsm" class="form-label">GSM</label>
                                        <input type="text" class="form-control" id="gsm" name="gsm" value="{{ $settings['gsm'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fax" class="form-label">Faks</label>
                                        <input type="text" class="form-control" id="fax" name="fax" value="{{ $settings['fax'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">E-posta</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $settings['email'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres</label>
                                    <textarea class="form-control" id="address" name="address">{{ $settings['address'] ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="google_maps" class="form-label">Google Haritalar</label>
                                    <textarea class="form-control" id="google_maps" name="google_maps">{{ $settings['google_maps'] ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                            <form id="social-form" class="setting-form">
                                @csrf
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $settings['facebook'] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $settings['twitter'] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $settings['instagram'] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ $settings['linkedin'] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="youtube" class="form-label">YouTube</label>
                                    <input type="url" class="form-control" id="youtube" name="youtube" value="{{ $settings['youtube'] ?? '' }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">
                            <form id="smtp-form" class="setting-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_host" class="form-label">SMTP Host</label>
                                        <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="{{ $settings['smtp_host'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_port" class="form-label">SMTP Port</label>
                                        <input type="number" class="form-control" id="smtp_port" name="smtp_port" value="{{ $settings['smtp_port'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_mail" class="form-label">SMTP Mail</label>
                                        <input type="email" class="form-control" id="smtp_mail" name="smtp_mail" value="{{ $settings['smtp_mail'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_password" class="form-label">SMTP Şifre</label>
                                        <input type="text" class="form-control" id="smtp_password" name="smtp_password" value="{{ $settings['smtp_password'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_ssl" class="form-label">SMTP SSL</label>
                                        <select class="form-select" id="smtp_ssl" name="smtp_ssl">
                                            <option value="1" {{ ($settings['smtp_ssl'] ?? '') == 1 ? 'selected' : '' }}>Evet</option>
                                            <option value="0" {{ ($settings['smtp_ssl'] ?? '') == 0 ? 'selected' : '' }}>Hayır</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_to_mail" class="form-label">SMTP To Mail</label>
                                        <input type="email" class="form-control" id="smtp_to_mail" name="smtp_to_mail" value="{{ $settings['smtp_to_mail'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_subject" class="form-label">SMTP Konu</label>
                                        <input type="text" class="form-control" id="smtp_subject" name="smtp_subject" value="{{ $settings['smtp_subject'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="smtp_company" class="form-label">SMTP Şirket</label>
                                        <input type="text" class="form-control" id="smtp_company" name="smtp_company" value="{{ $settings['smtp_company'] ?? '' }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>

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
        $('.setting-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.settings.update') }}',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
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
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Bir hata oluştu.',
                    });
                }
            });
        });
        $('#dark_logo').on('change', function() {
            previewImage(this, '#dark_logo_preview');
        });

        $('#light_logo').on('change', function() {
            previewImage(this, '#light_logo_preview');
        });

        $('#favicon').on('change', function() {
            previewImage(this, '#favicon_preview');
        });

        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endsection