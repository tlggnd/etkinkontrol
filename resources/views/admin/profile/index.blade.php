@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title mb-0">Profil Düzenleme</h6>

                    <form id="profileForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo_path" class="form-label">Profil Resmi</label>
                            <input id="profile_photo_path" type="file" class="form-control" name="profile_photo_path">
                            <span class="text-danger error-text profile_photo_path_error"></span>
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profil Resmi" style="max-width: 100px; margin-top: 5px;">
                            @endif
                             <div id="image-preview" class="mt-2"></div> {{-- Resim önizlemesi için --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>

                    <hr>
                    <h6 class="card-title mb-3">Şifre Değiştir</h6>

                     <form id="passwordForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mevcut Şifre</label>
                            <input id="current_password" type="password" class="form-control" name="current_password" required>
                            <span class="text-danger error-text current_password_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Yeni Şifre</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                               <span class="text-danger error-text password_error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Yeni Şifre Tekrarı</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                             <span class="text-danger error-text password_confirmation_error"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Şifreyi Değiştir</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#profileForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.profile.update') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.error-text').text('');
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: response.message,
                            }).then((result) => {
                                // Sayfayı yenile
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: xhr.responseJSON.message || 'Bir hata oluştu.',
                            });
                        }
                    }
                });
            });

             $('#passwordForm').submit(function(e) { // Şifre formu için id
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.profile.password.update') }}", // Şifre güncelleme route'u
                    type: "POST",  // Veya PUT, duruma göre
                    data: formData,
                    contentType: false,
                    processData: false,
                     beforeSend: function() {
                        $('.error-text').text('');
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: response.message,
                            }).then(function(){
                                 window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                         if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]); // Hata mesajlarını göster
                            });
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: xhr.responseJSON.message || 'Bir hata oluştu.',
                            });
                        }
                    }
                });
            });

             // Resim önizlemesi
                document.getElementById('profile_photo_path').addEventListener('change', function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('image-preview');
                    preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px; height: auto;">';
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });

    </script>
@endsection