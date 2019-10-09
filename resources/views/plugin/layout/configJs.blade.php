<script>
    var g_upload_url = '{{ admin_url('FileUpload','handle',['type'=>'upload']) }}';
    var g_upload_files = '{{ admin_url('FileUpload','handle',['type'=>'files']) }}';

    var g_import_url = '{{ route('admin.excel.import',['type'=>'import']) }}';
    var g_import_post_url = '{{ route('admin.excel.import',['type'=>'importpost']) }}';

    var g_icon_url = '{{ admin_url('Icon','index') }}';
    layui.config({
        version: "{{ env('APP_DEBUG')?time():'v1.6' }}",
        debug: false,
        base: '{{ ___("/admin") }}/' //静态资源所在路径
    }).extend({
        index: '/lib/index'//主入口模块,
    })


</script>