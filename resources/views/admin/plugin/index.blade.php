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
                , {field: 'thumb', title: '缩略图', width: 200, templet: '#tpl-user-thumb'}
                , {
                    field: 'name', title: '名称', templet: function (d) {
                      return  layui_title_show(d.name,d.show_url,'open_layer')
                    }
                }
                , {field: 'version', title: '版本号', width: 100}
                , {field: 'author', title: '作者', width: 170}

                , {
                    field: 'is_install', title: '是否安装', width: 100, templet: function (d) {
                        //return layui_switch('is_install',d,'已安装|未安装');
                        var arr = ['未安装', '已安装']
                        return layui_label(arr[d.is_install], d.is_install == 1 ? 'success' : 'warning')
                    }

                },
                {
                    field: 'is_checked', title: '是否启用', width: 100, templet: function (d) {
                        return layui_switch('is_checked', d, '启用|禁用');

                    }
                },
                {
                    field: 'menu_show', title: '菜单显示', width: 100, templet: function (d) {
                        return layui_switch('menu_show', d, '菜单|独立', 1, 1, 2);

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