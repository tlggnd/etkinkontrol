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