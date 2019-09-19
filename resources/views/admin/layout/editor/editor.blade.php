<link rel="stylesheet" href="{{ ___('/admin/js/summernote/summernote-lite.css') }}">
<script src="{{ ___('/admin/js/summernote/summernote-lite.js') }}"></script>
<script src="{{ ___('/admin/js/summernote/lang/summernote-zh-CN.js') }}"></script>
<script src="{{ ___('/admin/js/summernote/plugin/uploader/upload-ext.js') }}"></script>

<script>

    function editor(obj, default_config) {
        var config = {
            minHeight: 150,
            tabsize: 4,
            lang: 'zh-CN',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video','uploader']],
                ['view', ['fullscreen', 'codeview']],
            ],

        };
        default_config = default_config || {};
        config = $.extend({}, config, default_config)
        var editor = $(obj).summernote(config);
        return editor;
    }
</script>