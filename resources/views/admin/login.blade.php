<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Giriş</title>

    <script src="{{ asset('admin/assets/js/color-modes.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo1/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .auth-side-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .high-res-logo,
        .low-res-logo {
            max-width: 100%;
            max-height: 400px;
        }

        .low-res-logo {
            display: none;
            padding: 20px 20px;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .high-res-logo {
                display: none;
            }

            .low-res-logo {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">
                                        <img class="high-res-logo" src="{{ asset('admin/assets/images/horizontal-logo.png') }}" alt="Yüksek Çözünürlüklü Logo">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="nobleui-logo d-block mb-2">ETKİN KONTROL</a>
                                        <h5 class="text-secondary fw-normal mb-4">Yönetim sayfasına giriş için aşağıdaki formu doldurun.</h5>
                                        <form class="forms-sample" id="loginForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">Mail Adresi</label>
                                                <input type="email" class="form-control" id="userEmail" name="email" placeholder="Mail adresiniz..">
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="userPassword" name="password" autocomplete="current-password" placeholder="Şifreniz..">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck" name="remember">
                                                <label class="form-check-label" for="authCheck">
                                                    Beni Hatırla
                                                </label>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                    Giriş Yap
                                                </button>
                                            </div>
                                            <div id="loginError" class="mt-3 text-danger"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.login') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Giriş Başarılı!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = response.redirect;
                            });
                        } else {
                            $('#loginError').text(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>