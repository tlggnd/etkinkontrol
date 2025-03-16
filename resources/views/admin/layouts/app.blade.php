<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  
	
	<title>@yield('title', 'Uzman Dijital Ajans Yönetim Paneli')</title>

  <!-- color-modes:js -->
  <script src="{{ asset('admin/assets/js/color-modes.js') }}"></script>
  <!-- endinject -->

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('admin/assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('admin/assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png')}}" />

  <style>
 .sidebar.collapsed {
    width: 60px;
}

.sidebar-button.collapsed button {
    width: 40px;
    padding: 8px;
}

.sidebar-button.collapsed .button-text {
    display: none;
}

.sidebar-button-link {
    display: block; /* a etiketini blok seviyesine getir */
}
.sidebar-button button {
    width: 100%;
    text-align: left;
}

.sidebar-button.collapsed button {
    width: 40px;
    padding: 8px;
    text-align: center; /* İkonu ortalamak için */
}

.sidebar-button.collapsed .button-text {
    display: none;
}
    .dark-swal {
        border: 1px solid #333;
    }

    .dark-swal-title {
        font-size: 1.2em;
    }

    .dark-swal-content {
        font-size: 1em;
    }
</style>

<style>
    body[data-theme="dark"] {
        background-color: #121212;
        color: #e0e0e0;
    }

    body[data-theme="light"] {
        background-color: #fff;
        color: #333;
    }

    .dark-swal {
        border: 1px solid #333;
    }

    .dark-swal-title {
        font-size: 1.2em;
    }

    .dark-swal-content {
        font-size: 1em;
    }

    .light-swal {
        border: 1px solid #ccc;
    }

    .light-swal-title {
        font-size: 1.2em;
    }

    .light-swal-content {
        font-size: 1em;
    }
</style>
</head>
<body>

	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
        @include('admin.layouts.navbar')
		
			<!-- partial -->

			@yield('content')

		<!-- partial:partials/_footer.html -->
          @include('admin.layouts.footer')
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('admin/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('admin/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('admin/assets/js/app.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('admin/assets/js/dashboard.js')}}"></script>
  
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{ asset('admin/assets/vendors/tinymce/tinymce.min.js')}}"></script>

<script src="{{ asset('admin/assets/js/tinymce.js')}}"></script>


@yield('scripts')

<script>
   function confirmLogout() {
    Swal.fire({
        title: 'Emin misiniz?',
        text: "Çıkış yapmak istediğinize emin misiniz?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet, Çıkış Yap!',
        cancelButtonText: 'İptal'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.createElement('form');
            form.action = "{{ route('admin.logout') }}";
            form.method = 'POST';
            form.style.display = 'none';

            let csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = "{{ csrf_token() }}";
            form.appendChild(csrfToken);

            document.body.appendChild(form);

            // Fetch ile formu gönder
            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarıyla çıkış yaptınız!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '/admin/login'; // Yönlendirme
                    });
                } else {
                    throw new Error('Çıkış sırasında bir hata oluştu.');
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: error.message,
                });
            });
        }
    });
}
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
   'use strict';

(function () {

    const footerText = document.querySelector('#footerText'); // Güncellendi

    if (footerText) {
        const options = {
            selector: '#footerText', // Güncellendi
            min_height: 350,
            default_text_color: 'red',
            plugins: [
                'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            promotion: false,
            licence_key: 'gpl'
        };

        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            options["content_css"] = "dark";
            options["content_style"] = `body{background: ${getComputedStyle(document.documentElement).getPropertyValue('--bs-body-bg')}}`
        } else if (theme === 'light') {
            options["content_css"] = "default";
        }

        tinymce.init(options);
    }

})();
});
</script>
</body>
</html>    