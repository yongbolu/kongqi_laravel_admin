@extends('admin.layout.base')
@section('add_css')
    <link rel="stylesheet" href="{{ ___('/admin/modules/treetable-lay/treetable.css') }}">
@endsection
@section('content')

    @include('admin.'.$controller_base_lower.'.form')
    @include('admin.layout.table')
@endsection
@section('foot_js')
    @include('admin.layout.ListConfig')
    <script>



        layui.use(['index','table', 'treetable'], function () {
            var $ = layui.jquery;
            var table = layui.table;
            var treetable = layui.treetable;

            // 渲染表格
            layer.load(2);
            table_id="#LAY-list-table";
           var tree= treetable.render({
                treeColIndex: 2,
                treeSpid: 0,
                treeIdName: 'id',
                treePidName: 'pid',
                elem: table_id,
                url: listConfig.index_url,
                page: false,
                response: {
                    statusName: 'code' //规定数据状态的字段名称，默认：code
                    , statusCode: 200 //规定成功的状态码，默认：0
                    , msgName: 'msg' //规定状态信息的字段名称，默认：msg
                    , countName: 'count' //规定数据总数的字段名称，默认：count
                    , dataName: 'data' //规定数据列表的字段名称，默认：data
                },
                where:{
                  limit:10000,
                    sort:'sort'
                },
                cols: [[

                    {field: 'icon', title: '图标',templet:"#tpl-icon",width: 80,align:'center'},
                    {field: 'sort', width: 80, title: '排序',edit:1},
                    {field: 'cn_name', minWidth: 200, title: '名称'},
                    {field: 'name', title: '路由',edit:1},

                    {title: '操作', width: 200, align: 'center', toolbar: '#tpl-create-edit'}
                ]],

                done: function () {
                    layer.closeAll('loading');
                }
            });

            $('#btn-expand').click(function () {
                treetable.expandAll(table_id);
            });

            $('#btn-fold').click(function () {

                treetable.foldAll(table_id);
            });




            $('#btn-search').click(function () {
                var keyword = $('#edt-search').val();
                var searchCount = 0;
                $(table_id).next('.treeTable').find('.layui-table-body tbody tr td').each(function () {
                    $(this).css('background-color', 'transparent');
                    var text = $(this).text();
                    if (keyword != '' && text.indexOf(keyword) >= 0) {
                        $(this).css('background-color', 'rgba(250,230,160,0.5)');
                        if (searchCount == 0) {
                            treetable.expandAll(table_id);
                            $('html,body').stop(true);
                            $('html,body').animate({scrollTop: $(this).offset().top - 150}, 500);
                        }
                        searchCount++;
                    }
                });
                if (keyword == '') {
                    layer.msg("请输入搜索内容", {icon: 5});
                } else if (searchCount == 0) {
                    layer.msg("没有匹配结果", {icon: 5});
                }
            });
        });



    </script>
@endsection