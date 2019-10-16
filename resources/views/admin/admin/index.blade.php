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
                {type: 'checkbox'}
                , {field: 'id', width: 80, title: 'ID', sort: true}
                , {field: 'thumb', title: '头像', width: 100, templet: '#tpl-user-thumb'}
                , {field: 'nickname', title: '昵称', edit: 1}
                , {field: 'account', title: '账号', edit: 1}
                , {field: 'roles_name', title: '角色',templet:function(d){
                        return d.roles_arr.join(',');
                    }}
                , {
                    field: 'is_checked', title: '状态', templet: function (d) {
                        return layui_switch('is_checked', d)
                    }
                }
                , {title: '操作', width: 200, align: 'center', toolbar: '#tpl-create-edit'}
            ]]
            //渲染
            listTable.render(listConfig.index_url, cols);
            //监听搜索
            listTable.search();


        });
    </script>
@endsection