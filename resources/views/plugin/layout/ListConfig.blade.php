<script>
    var listConfig = {
        index_url: "{!!  plugin_url($controller_base,'getList',request()->all())  !!}",
        table_name: '{{ $table_name }}',
        page_name: '{{ $page_name }}',
        del_url: "{{ plugin_url($controller_base,'destroy') }}",
        edit_field_url: "{{ plugin_url($controller_base,'editTable') }}",
        create_url: '{!!  plugin_url($controller_base,'create',request()->all()) !!}',
        stroe_url: "{{ plugin_url($controller_base,'store') }}",
        checked_url: '',
        open_height: '100%',
        open_width: '100%'
    };

</script>
@include('admin.layout.layuiTpl')