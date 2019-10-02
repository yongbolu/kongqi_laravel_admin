layui.define(['layer', 'admin', 'layerOpen', 'uploader', 'laydate','colorpicker','request'], function (exports) {
    var $ = layui.$;
    var uploader = layui.uploader;
    var admin = layui.admin;
    var custorm = {};
    var layerOpen = layui.layerOpen;
    var laydate = layui.laydate;
    var colorpicker = layui.colorpicker;
    var req = layui.request;
    //卡片伸缩
    collapse();
    //上传单图监听
    uploadListen();
    //多图
    uploadMoreListen();

    function collapse() {
        $('[data-perform="panel-collapse"]').on('click', function () {
            //取得父级
            var parentObj = $(this).parents(".panel");
            parentObj.toggleClass('open');
            h = 'auto';
            if (parentObj.hasClass('open')) {
                parentObj.find('.layui-card-body').hide();
                var h = '0';


            } else {

                parentObj.find('.layui-card-body').show().css({
                    height: h
                })
            }

        })
    }

    //上传批量监听
    function uploadListen() {
        $(".js-pic-upload").each(function () {
            var that = $(this);
            var objName = '#' + $(this).attr('id');
            uploader.one(objName);
        })
    }

    //多图监听
    function uploadMoreListen() {
        $(".js-pic-upload-more").each(function () {
            var that = $(this);
            var objName = '#' + $(this).attr('id');
            uploader.more(objName);
        })
    }

    //颜色选择器
    $('[kq-event="color"]').each(function () {
        //
        othis = $(this);
        var color_obj=othis.data('color_obj');
        //标识符为选择

        colorpicker.render({
            elem: color_obj,
            color:othis.val()
            ,done: function(color){
                othis.val(color);

            },
            change: function(color){
                othis.val(color);

            }
        });


    });

    $('[kq-event="date"]').each(function () {

        othis = $(this);
        var to_obj = othis.data('obj');

        var format = othis.data('format');
        var value = othis.val() || othis.data('value');
        var min = othis.data('min');
        var max = othis.data('max');
        var set_config=othis.data('config');

        var config = {
            elem: this
            , trigger: 'click'
            , type: 'datetime',
            format: format,
            value: value || ''
        }
        if(set_config)
        {
            config=$.extend({},config,set_config);
        }
        if (min) {
            config.min = min;
        }
        if (max) {
            config.max = max;
        }

        laydate.render(config);
        /*  laydate.render({
              elem: '#' + to_obj
              , type: 'datetime',
              format: format,
              value: value || ''

          });*/
    })


    //监听事件
    var kq_events = {
        msg: function (othis) {
            var title = othis.data('title');
            var text = othis.data('content');

            layer.open({
                title: title ? title : '提示',
                btnAlign: 'c'
                , content: text
            });

        },
        show_pic: function (othis) {
            var src = othis.data('src');
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
        },
        del_upload_pic: function (othis) {
            layer.msg('确定移除吗？', {
                btn: ['确定', '取消'],
                time: 0,
                yes: function (index, layero) {
                    var parentObj = othis.parents('.item');
                    parentObj.removeClass('show');
                    //移除图片地址
                    parentObj.find(".upload-item-pic").attr('src', '');
                    //移除表单地址
                    parentObj.find(".upload-item-field").val('');

                    layer.close(index)

                }
            });

        },
        icon: function (othis) {
            //打开图片空间
            var url = g_icon_url;
            var to_obj = othis.data('obj');
            layerOpen.open({
                title: '图标',
                type: 2,
                url: url + '?to=' + to_obj,
                w: '80%',
                h: '80%',
                btn: []
            }, function (layero, index) {

            })
        },

        //图片空间
        upload_place: function (othis) {
            var is_more = othis.data('more');
            var to_obj = othis.data('obj');
            var type = othis.data('type');
            var open_file = othis.data('open_file');
            if (open_file != 0) {
                open_file = 1;
            }

            uploader.place(to_obj, type, is_more, open_file)
        },
        //打开layui open
        open_layer:function(othis){
            var w = othis.data('w');
            var h = othis.data('h');
            var title = othis.data('title');
            var url = othis.data('url');
            var config = {
                title: title,
                h: h,
                w: w
            };

            yesFun = function (layero, index) {
                layer.close(index); //关闭弹层
            }
            layerOpen.show(url, config, yesFun);

        },
        //打开提交编辑
        open_layer_post:function(othis){
            w = othis.data('w');
            h = othis.data('h');
            title = othis.data('title');
            url = othis.data('url');
            post_url = othis.data('post_url');
            var config = {
                title: title,
                w: w,
                h: h
            };

            layerOpen.edit(url, post_url, config, callFun);
        },
        //直接打开询问提交
        open_post:function (othis) {
            w = othis.data('w');
            h = othis.data('h');
            title = othis.data('title');

            post_url = othis.data('post_url');
            btn = othis.data('btns') || ['确定', '取消'];



            var post_index=layer.open({
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

    };
    $body = $('body');
    //点击事件
    $body.on('click', '*[kq-event]', function () {
        var othis = $(this)
            , attrEvent = othis.attr('kq-event');
        kq_events[attrEvent] && kq_events[attrEvent].call(this, othis);
    });

    exports('custorm', custorm);

});