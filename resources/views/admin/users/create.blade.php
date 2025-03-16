@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Yeni Kullanıcı Oluştur</h6>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-12">
                            <form id="createUserForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Şifre</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <span class="text-danger error-text password_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                    <span class="text-danger error-text password_confirmation_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="is_admin" class="form-label">Yönetici</label>
                                    <select name="is_admin" id="is_admin" class="form-select">
                                        <option value="0">Hayır</option>
                                        <option value="1">Evet</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Oluştur</button>
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
        $(document).ready(function() {
            $('#createUserForm').on('submit', function(e) {
                e.preventDefault();

                var form = this;

                $.ajax({
                    url: "{{ route('admin.users.store') }}",
                    method: "POST",
                    data: new FormData(form),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $(form)[0].reset();
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: data.msg,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.users.index') }}";
                                }
                            });
                        }
                    },
                });
            });
        });
    </script>
@endsection