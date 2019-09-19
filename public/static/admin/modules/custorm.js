layui.define(['layer', 'admin', 'layerOpen', 'uploader', 'laydate'], function (exports) {
    var $ = layui.$;
    var uploader = layui.uploader;
    var admin = layui.admin;
    var custorm = {};
    var layerOpen = layui.layerOpen;
    var laydate = layui.laydate;

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