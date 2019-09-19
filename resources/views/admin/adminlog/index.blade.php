@extends('admin.layout.base')
@section('add_css')

@endsection
@section('content')
    @include('admin.'.$controller_base_lower.'.form')
    @include('admin.layout.table')
@endsection
@section('foot_js')
    @include('admin.layout.ListConfig')
    <script>

        layui.use(['index', 'listTable'], function () {
            var $ = layui.$
                , listTable = layui.listTable;
            cols = [[
                {field: 'mark', title: '描述', minWidth: 180}
                , {field: 'name', title: '操作人', minWidth: 100}
                , {field: 'ip', title: '操作ip', minWidth: 140}
                , {field: 'url', title: '操作地址', minWidth: 200}
                , {field: 'created_at', title: '操作时间', width: 180}
            ]]
            //渲染
            listTable.render(listConfig.index_url, cols);
            //监听搜索
            listTable.search();


        });
    </script>
@endsection