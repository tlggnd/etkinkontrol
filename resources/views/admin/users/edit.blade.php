@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Kullanıcı Düzenle</h6>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-12">
                            <form id="user-edit-form" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Yeni Şifre (Boş bırakırsanız değişmez)</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <div id="password-error" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Yeni Şifre Tekrarı</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    <div id="password-confirm-error" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="is_admin" class="form-label">Yönetici</label>
                                    <select name="is_admin" id="is_admin" class="form-select">
                                        <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Hayır</option>
                                        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Evet</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">İptal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password_confirmation');
        const passwordConfirmError = document.getElementById('password-confirm-error');

        function checkPasswordMatch() {
            if (passwordInput.value !== passwordConfirmInput.value) {
                passwordConfirmError.textContent = 'Şifreler eşleşmiyor.';
            } else {
                passwordConfirmError.textContent = '';
            }
        }

        passwordConfirmInput.addEventListener('input', checkPasswordMatch);
        passwordInput.addEventListener('input', checkPasswordMatch);

        document.getElementById('user-edit-form').addEventListener('submit', function (event) {
            if (passwordInput.value !== passwordConfirmInput.value) {
                passwordConfirmError.textContent = 'Şifreler eşleşmiyor.';
                event.preventDefault();
            }
        });
    });

    $(document).ready(function () {
        $('#user-edit-form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: response.message
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('admin.users.index') }}";
                        }
                    });
                },
                error: function (error) {
                    if (error.status === 422) {
                        let errors = error.responseJSON.errors;
                        let errorMessages = '';
                        for (let key in errors) {
                            errorMessages += errors[key][0] + '<br>';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            html: errorMessages
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: error.responseJSON.message || 'Bir hata oluştu.'
                        });
                    }
                }
            });
        });
    });
</script>
@endsection