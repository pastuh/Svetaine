<script>
    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        forced_root_block : "",
        force_br_newlines : false,
        force_p_newlines : false,
        oninit : "setPlainText",
        noneditable_noneditable_class: 'fa',
        extended_valid_elements: 'span[*]',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'template paste textcolor colorpicker textpattern imagetools toc paste fontawesome noneditable'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | fontawesome | code',
        toolbar2: '',
        image_advtab: true,
        templates: [
            {title: 'Short info line', content: '@include('components/templates/_short-info')'},
            {title: 'Ikonėlės gyvūnui', content: '@include('components/templates/_icon-info')'},
            {title: 'Vietovės gyvūnui', content: '@include('components/templates/_map-info')'},
            {title: 'Žaidimo info eilutės', content: '@include('components/templates/_game-info')'}
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            'https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        branding: false
    });
</script>