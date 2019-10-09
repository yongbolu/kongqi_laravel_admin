layui.define(['table', 'form', 'request', 'layerOpen', 'laypage', 'layer', 'laydate'], function (exports) {
    var $ = layui.$;
    var table = layui.table;
    var form = layui.form;
    var req = layui.request;
    var element = layui.element;
    var laydate = layui.laydate;

    var layerOpen = layui.layerOpen;
    var laypage = layui.laypage;
    var layer = layui.layer
    var listTable = {
        render: listTableRender,
        search: listSearch,
        handle: handleListenTable,
        top: handelTopListenTable,
        diy_list: diyList

    }

    function diyList(objApp, url, pageconfig, handleFun, successCallback, errorCallback) {
        layer.load(3); //风格1的加载
        pageconfig = pageconfig || {};
        var laypage = layui.laypage;
        var laypageparams = {
            obj_id: 'page',
            limit: 10,
            limits: [1, 10, 30, 50, 70],
            layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
        };
        laypageparams = $.extend(laypageparams, pageconfig);
        req.post(url, {limit: laypageparams.limit}, function (data) {
            if (data.total <= 0) {
                return false;
            }
            laypage.render({
                limit: laypageparams.limit,
                elem: laypageparams.obj_id,
                count: data.total,
                limits: laypageparams.limits,
                layout: laypageparams.layout,
                theme: "#62a8ea",
                jump: function (obj, first) {
                    if (typeof(handleFun) != "function" && typeof(successCallback) == "function") {
                        return successCallback(obj, first);
                    }

                    if (first) {
                        if (typeof(handleFun) == "function") {
                            return handleFun(data);
                        } else {
                            return $(".tuku-list").empty().append(data.contents);
                        }


                    }
                    layer.load(3); //风格1的加载
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'post',
                        data: {
                            offset: obj.curr,
                            limit: obj.limit,
                            _token: $('[name="csrf-token"]').attr('content')
                        },
                        success: function (tdata) {
                            if (tdata.total <= 0) {
                                return false;
                            }

                            if (typeof(handleFun) == "function") {

                                return handleFun(tdata);
                            } else {
                                console.log(tdata.contents);
                                $(objApp).empty().append(tdata.contents);
                                return '';
                            }

                        },
                        complete: function () {
                            layer.closeAll('loading');
                        }
                    })
                }
            });
        }, '', function () {
            layer.closeAll('loading');
        })


    }


    /**
     * 列表表格渲染
     * @param url
     * @param cols
     * @param config
     */
    function listTableRender(url, cols, config, extendFun) {
        config = config || {};
        defatul_config = {
            elem: '#LAY-list-table',
            page: true,
            toolbar: true,
            method: 'post',
            limit: 30,
            limits: [
                20, 30, 40, 50, 70, 100, 120, 150, 200
            ],
            text: {
                none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
            },
            where: {
                _token: $('[name="csrf-token"]').attr('content'),
            },
            cellMinWidth: 120,
            // width:$(window).width()<=1000?1000:$(window).width(),
            url: url, //模拟接口
            cols: cols,
            response: {
                statusName: 'code' //规定数据状态的字段名称，默认：code
                , statusCode: 200 //规定成功的状态码，默认：0
                , msgName: 'msg' //规定状态信息的字段名称，默认：msg
                , countName: 'count' //规定数据总数的字段名称，默认：count
                , dataName: 'data' //规定数据列表的字段名称，默认：data
            }

        };
        render_config = $.extend({}, defatul_config, config);
        console.log(render_config);

        table.render(render_config);
        //监听表
        handleListenTable(extendFun);
        //顶部操作
        handelTopListenTable();
    }

    /**
     * 监听编辑
     */
    function handleListenTable(extendFun, callFun) {
        //监听表操作
        table.on('tool(LAY-list-table)', function (obj) {
            var data = obj.data;
            var update_url = data.edit_post_url;

            //监听表格事件里面的删除
            if (obj.event === 'del') {
                layer.msg('确定删除吗?', {
                    time: 0,
                    btn: ['确定', '不'],
                    yes: function (index) {
                        var field = {
                            ids: data.id,
                            type_id: 'id',
                            handle_str: '删除' + listConfig.page_name,
                            _method: "PUT"
                        };
                        req.post(listConfig.del_url, field, function (res) {
                            layer.msg(res.msg);
                            if (res.code == 200) {
                                obj.del();
                                layer.close(index);
                                table.reload('LAY-list-table');

                            }
                            callFun && callFun(res)
                        });
                    }
                });

            }
            ;
            //监听表格事件里面的拷贝事件
            if (obj.event === 'copy') {
                var copy_url = data.copy_url;
                layer.confirm('确定复制吗？', function (index) {
                    req.post(copy_url, field, function (res) {
                        layer.msg(res.msg);
                        if (res.code == 200) {
                            table.reload('LAY-list-table');
                            layer.close(index); //关闭弹层


                        }
                        callFun && callFun(res)
                    });


                });
            }
            ;
            //监听事件里面的编辑事件
            if (obj.event === 'edit') {
                /**
                 * 快速编辑监听操作
                 */
                layerOpen.edit(data.edit_url, update_url, {
                    w: listConfig.open_width,
                    h: listConfig.open_height,
                    title: '编辑' + listConfig.page_name,
                }, callFun);

            }
            //查看图片
            if (obj.event === 'show_img') {
                var src = $(this).data('src');
                src = src || $(this).attr('src');

                layer.photos({
                    photos: {
                        "title": "查看"
                        ,
                        "data": [{
                            "src": src
                        }]
                    },
                    shade: 0.01,
                    closeBtn: 1,
                    anim: 5
                });
            }

            //打开openLayer
            if (obj.event === 'open_layer') {

                w = $(this).data('w');
                h = $(this).data('h');
                title = $(this).data('title');
                url = $(this).data('url');
                var config = {
                    title: title,
                    h: h,
                    w: w
                };

                yesFun = function (layero, index) {
                    layer.close(index); //关闭弹层
                }
                layerOpen.show(url, config, yesFun);
            }

            //打开openLayer操作提交数据
            if (obj.event === 'open_layer_post') {

                w = $(this).data('w');
                h = $(this).data('h');
                title = $(this).data('title');
                url = $(this).data('url');
                post_url = $(this).data('post_url');
                var config = {
                    title: title,
                    w: w,
                    h: h
                };

                layerOpen.edit(url, post_url, config, callFun);
            }

            //打开是否提交POST数据
            if (obj.event === 'open_post') {

                w = $(this).data('w');
                h = $(this).data('h');
                title = $(this).data('title');

                post_url = $(this).data('post_url');
                btn = $(this).data('btns') || ['确定', '取消'];


                var post_index = layer.open({
                    type: 1
                    ,
                    title: false //不显示标题栏
                    ,
                    closeBtn: false
                    ,
                    area: '300px;'
                    ,
                    shade: 0.2

                    ,
                    btn: btn
                    ,
                    btnAlign: 'c'
                    ,
                    moveType: 1 //拖拽模式，0或者1
                    ,
                    content: '<div style="padding: 20px; text-align: center; line-height: 22px; background-color: #009688; color: #fff; font-weight: 300;">' + title + '</div>'
                    ,
                    success: function (layero) {


                    }, yes: function (index, layero) {
                        layer.close(post_index); //关闭弹层
                        var loading = layer.load(0, {shade: false});
                        req.post(post_url, {}, function (res) {
                            layer.close(loading);
                            layer.msg(res.msg);
                            if (res.code == 200) {
                                table.reload('LAY-list-table');
                                layer.close(index); //关闭弹层


                            }
                            callFun && callFun(res)
                        });
                    }

                })
            }
            //附加监听表
            if (typeof(extendFun) == "function") {
                return extendFun(obj, $(this));
            }

        });
        //监听单元格编辑
        table.on('edit(LAY-list-table)', function (obj) {
            var value = obj.value //得到修改后的值
                ,
                data = obj.data //得到所在行所有键值
                ,
                field = obj.field; //得到字段
            //ajax操作
            data = {
                field: field,
                field_value: value,
                ids: data.id

            };
            if (field == 'sort') {
                reg = /^[0-9]*$/;
                if (!reg.test(value)) {
                    layer.msg('只能输入数字');
                    return false;
                }
            }


                req.post(listConfig.edit_field_url, data, function (res) {
                    layer.msg(res.msg);
                    if (field == 'sort') {
                        table.reload('LAY-list-table');
                    }
                    //回调
                    callFun && callFun(res)
                })




        });


    }

    /**
     * 顶部删除
     * @returns {*}
     */
    function topDel(callFun) {
        var checkStatus = table.checkStatus('LAY-list-table'),
            checkData = checkStatus.data; //得到选中的数据

        if (checkData.length === 0) {
            return layer.msg('请选择数据');
        }

        layer.confirm('确定删除吗？', function (index) {

            //获得id
            id = new Array();
            for (i in checkData) {
                id.push(checkData[i]['id']);
            }
            field = {
                _method: 'PUT',
                ids: id.join(','),
                table: listConfig.table_name,
                type_id: 'id',
                handle_str: listConfig.page_name
            };

            req.post(listConfig.del_url, field, function (res) {
                layer.msg(res.msg);
                if (res.code == 200) {
                    table.reload('LAY-list-table');
                    layer.close(index); //关闭弹层
                    callFun && callFun(res)
                }
            });


        });
    }

    function doHandel(callFun) {
        var checkStatus = table.checkStatus('LAY-list-table'),
            checkData = checkStatus.data; //得到选中的数据

        if (checkData.length === 0) {
            return layer.msg('请选择数据');
        }
        var field = $(this).data('field');
        var value = $(this).data('value') ;
        console.log($(this).data());
        layer.confirm('确定批量操作吗？', function (index) {

            //获得id
            id = new Array();
            for (i in checkData) {
                id.push(checkData[i]['id']);
            }



            //ajax操作
            var data = {
                field: field,
                field_value: value,
                ids: id.join(',')
            };
            req.post(listConfig.edit_field_url, data, function (res) {
                layer.msg(res.msg);
                if (res.code == 200) {
                    table.reload('LAY-list-table');
                    layer.close(index); //关闭弹层
                    callFun && callFun(res)
                }
            })

        });


    }

    /**
     * 顶部添加
     */
    function topAdd(callFun) {

        layerOpen.edit(listConfig.create_url, listConfig.stroe_url, {
            w: listConfig.open_width,
            h: listConfig.open_height,
            title: '添加' + listConfig.page_name,
        }, callFun);

    }

    /**
     * 导入数据
     */
    function importHandle(callFun) {
        var del = $(this).data('del');
        del = del || '';
        var url = g_import_url + '?table=' + listConfig.table_name + '&del=' + del;
        var ajax_url = g_import_post_url;
        layerOpen.edit(url, ajax_url, {
            h: '500px',
            w: '750px',
            title: '导入数据',
        }, callFun);

    }

    /**
     * 顶部自定义添加
     */
    function topCreate(callFun) {
        var url = $(this).data('url');
        var post_url = $(this).data('post_url');
        w = $(this).data('w');
        h = $(this).data('h');
        title = $(this).data('title');
        layerOpen.edit(url, post_url, {
            h: h,
            w: w,
            title: title
        }, callFun);
    }


    function handelTopListenTable(callFun) {

        var active = {
            all_del: topDel,
            add: topAdd,
            diy_add: topCreate,
            import: importHandle,
            handel:doHandel
        };
        $('.layui-btn.kongqi-handel').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this, callFun) : '';
        });

    }

    /**
     * 列表搜索
     */
    function listSearch() {

        form.on('submit(LAY-list-search)', function (data) {
            console.log(data);
            var field = data.field;
           // field.page=1;
            console.log(field);
            //执行重载
            table.reload('LAY-list-table', {
                where: field
            });
        });
    }


    //监听列表其他组件事件,开关设置
    form.on('switch(table-checked)', function (obj) {

        var field = $(this).data('field');
        var true_value = $(this).data('true_value') || 1;
        var false_value = $(this).data('false_value') || 0;
        var value = obj.elem.checked ? true_value : false_value;
        var id = $(this).data('id');
        field = field || 'is_checked';
        //ajax操作
        var data = {
            field: field,
            field_value: value,
            ids: id
        };


        req.post(listConfig.edit_field_url, data, function (res) {
            layer.msg(res.msg);
        })


    });

    exports('listTable', listTable);
});
