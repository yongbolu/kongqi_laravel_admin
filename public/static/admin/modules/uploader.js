layui.define(['upload', 'laypage', 'form', 'laydate', 'layerOpen', 'layer'], function (exports) {
    var upload = layui.upload;
    var $ = layui.$;
    var layerOpen = layui.layerOpen;
    var uploader = {
        one: uploadOne,
        more: uploadMore,
        json_pic: jsonThumbs,
        list_upload: uploadFileList,
        place: uploadPlace,
        place_editor: uploadEditor,
        place_api: uploadOpenApi
    }


    function uploadPlaceApi(url, callFun) {
        layerOpen.open({
            title: '文件库',
            type: 2,
            url: url,
            w: '80%',
            h: '80%',
            btn: ['确定选择', '关闭']
        }, function (layero, index) {
            callFun && callFun(layero, index);
        })
    }

    function uploadOpenApi(type, is_more, open_file, callFun) {
        var url = g_upload_files + '?is_more=' + is_more + '&type=' + type + '&open_file=' + open_file;
        uploadPlaceApi(url, function (layero, index) {
            var item_img = layero.find('iframe').contents().find('.on');
            console.log(item_img);
            var img_arr = [];
            if (is_more == 1) {

                item_img.find('img').each(function () {
                    var tmpname = $(this).data('tmpname');
                    var path = $(this).data('path');
                    var img_src = $(this).data('view_src');
                    var file_type = $(this).data('type');
                    var oss = $(this).data('oss');
                    var ext = $(this).data('ext');
                    var res = {
                        type: file_type,
                        view_src: img_src,
                        oss_type: oss,
                        ext: ext,
                        tmpname: tmpname,
                        path: path
                    }
                    img_arr.push(res);
                });

            } else {


                var tmpname = item_img.find('img').data('tmpname');
                var path = item_img.find('img').data('path');
                var img_src = item_img.find('img').data('view_src');
                var file_type = item_img.find('img').data('type');
                var oss = item_img.find('img').data('oss');
                var ext = item_img.find('img').data('ext');
                var res = {
                    type: file_type,
                    view_src: img_src,
                    oss_type: oss,
                    ext: ext,
                    tmpname: tmpname,
                    path: path
                }
                img_arr.push(res);
            }
            layer.close(index); //关闭弹层
            return callFun && callFun(img_arr);
        });
    }

    function uploadEditor(type, is_more, callFun, is_markdown) {
        var url = g_upload_files + '?is_more=' + is_more + '&type=' + type;
        uploadPlaceApi(url, function (layero, index) {
            var item_img = layero.find('iframe').contents().find('.on');
            if (is_more == 1) {
                var html_str = '';

                item_img.find('img').each(function () {
                    var tmpname = $(this).data('tmpname');
                    var path = $(this).data('path');
                    var img_src = $(this).data('view_src');
                    var file_type = $(this).data('type');
                    var oss = $(this).data('oss');
                    var ext = $(this).data('ext');
                    var res = {
                        type: file_type,
                        view_src: img_src,
                        oss_type: oss,
                        ext: ext,
                        tmpname: tmpname,
                        path: path
                    }

                    if (file_type == 'vedio') {

                    } else if (file_type == 'image') {
                        if (is_markdown) {
                            html_str += '![' + tmpname + '](' + path + ')  \n';
                        } else {
                            html_str += '<img src="' + path + '" alt="' + tmpname + '">';
                        }


                    }


                });

                callFun && callFun(html_str);
            } else {

                path = item_img.find('img').data('path');
                var tmpname = $(this).data('tmpname');

                if (is_markdown) {
                    html_str = '![' + tmpname + '](' + path + ')  ';
                } else {
                    html_str = '<img src="' + path + '" alt="' + tmpname + '">';
                }
                callFun && callFun(html_str);
            }

            layer.close(index); //关闭弹层
        });
    }

    function uploadPlace(obj, type, is_more, open_file) {
        //打开图片空间
        var url = g_upload_files + '?is_more=' + is_more + '&type=' + type + '&open_file=' + open_file;

        uploadPlaceApi(url, function (layero, index) {
            var item_img = layero.find('iframe').contents().find('.on');
            if (is_more == 1) {
                var html_str = '';

                item_img.find('img').each(function () {
                    var tmpname = $(this).data('tmpname');
                    var path = $(this).data('path');
                    var img_src = $(this).data('view_src');
                    var file_type = $(this).data('type');
                    var oss = $(this).data('oss');
                    var ext = $(this).data('ext');
                    var res = {
                        type: file_type,
                        view_src: img_src,
                        oss_type: oss,
                        ext: ext,
                        tmpname: tmpname,
                        path: path
                    }

                    if (file_type == 'vedio') {

                    } else if (file_type == 'image') {

                        html_str += '<div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 tupload-item upload-item-more ">' +
                            ' <img data-type="' + res.type + '" data-view_src="' + res.view_src + '" data-oss="' + res.oss_type + '" data-ext="' + res.ext + '" data-tmpname="' + res.tmpname + '" data-src="' + res.path + '" src="' + res.view_src + '" class="upload-item-pic" alt=""> ' +
                            '<div class="item-foot-tools">' +
                            '<button type="button" class="layui-btn layui-btn-xs layui-btn-green js_left_pic"><i class=" ti-arrow-left"></i> </button>' +
                            '<button type="button" class="layui-btn layui-btn-xs layui-btn-danger js_remove_pic">删除</button>' +
                            '<button type="button" class="layui-btn layui-btn-xs layui-btn-green js_right_pic"><i class=" ti-arrow-right"></i> </button>' +
                            '</div> ' +
                            '</div>';

                    }


                });

                var parentObj = $(obj);
                //插入数据
                parentObj.find(".upload-item-upload-obj").before(html_str);
                //重新计算JSON
                jsonThumbs(parentObj);
            } else {

                path = item_img.find('img').data('path');
                img_src = item_img.find('img').attr('src');
                img_src = img_src || item_img.find('video').attr('src');

                $(obj + " .upload-item-one").addClass('show');
                $(obj + ' .upload-item-pic').attr('src', img_src);
                $(obj + " .upload-item-field").val(path);
                $(obj + ' [ kq-event="show_pic"]').data('src', img_src)
            }

            layer.close(index); //关闭弹层
        });

    }

    //上移
    $(document).on('click', '.js_left_pic', function (event) {

        var onthis = $(this).parents(".upload-item-more");
        var getup = $(this).parents(".upload-item-more").prev(".upload-item-more");
        if (getup.html() != null) {
            $(getup).before(onthis);
        }
        var parentObj = $(this).parents(".layui-uploads-pic");
        jsonThumbs(parentObj);

    });
    //下移动
    $(document).on('click', '.js_right_pic', function (event) {

        var onthis = $(this).parents(".upload-item-more");
        var getup = $(this).parents(".upload-item-more").next(".upload-item-more");
        if (getup.html() != null) {
            $(getup).after(onthis);
        }
        var parentObj = $(this).parents(".layui-uploads-pic");
        jsonThumbs(parentObj);

    });
    //删除
    $(document).on('click', '.js_remove_pic', function (event) {
        var onthis = $(this).parents(".upload-item-more");
        var parentObj = $(this).parents(".layui-uploads-pic");

        layer.msg('你确定要取消删除吗？', {
            time: 0,
            btn: ['删除', '取消'], //按钮
            yes: function (index) {
                onthis.remove();
                layer.close(index)
                jsonThumbs(parentObj);
            }
        });

    });

    function jsonThumbs(parentObj) {
        //计算数据
        var items = [];
        parentObj.find(".upload-item-more").each(function () {
            var that = $(this);
            var path = that.find('img').data('src')
            var tmpname = that.find('img').data('tmpname')
            var ext = that.find('img').data('ext');
            var oss_type = that.find('img').data('oss');
            var view_src = that.find('img').data('view_src');
            var type = that.find('img').data('type');
            //进行数据渲染
            items.push(
                {
                    path: path,
                    type: type,
                    view_src: view_src,
                    tmp: tmpname,
                    ext: ext,
                    oss_type: oss_type
                })
        })
        console.log(items);
        //格式JSON

        var json = JSON.stringify(items);
        if (items.length <= 0) {
            json = '';
        }
        parentObj.find(" .upload-item-field").val(json ? encodeURI(json) : '')
    }

    /**
     * 上传图片接口
     * @param obj
     * @param upload_type
     * @param screen_type
     * @param accept_type
     * @param successFun
     * @param resFun
     * @returns {*}
     */
    function uploadApi(obj, upload_type, screen_type, accept_type, successFun, resFun) {
        var group_id = 0;
        group_id = $(obj).data('group_id');


        return upload.render({
            elem: $(obj),
            url: g_upload_url,//全局上传接口地址
            data: {
                _token: $('[name="csrf-token"]').attr('content'),
                uptype: upload_type,
                screen_type: screen_type,
                group_id: group_id || 0
            },
            multiple: true,
            accept: accept_type
            , before: function () {
                //groupd_id = $(obj).data('group_id');

            },
            done: function (res) {

                resFun && resFun(res);
                if (res.success == 1) {
                    successFun && successFun(res);

                } else {
                    layer.msg(res.state);
                }

            }
        });
    }

    function uploadFileList(obj, accept_type) {
        //上传类型
        var upload_type = $(obj).data('type');
        console.log('upload_type', upload_type);
        //使用场景
        var screen_type = $(obj).data('screen_type');
        accept_type = accept_type || 'images';
        upload_type = upload_type || 'image';
        screen_type = screen_type || '';
        if (upload_type != 'image') {
            accept_type = 'file';
        }
        return uploadApi(obj, upload_type, screen_type, accept_type, function (res) {
            //找到父
            var parentObj = $(obj).parents(".upload-tuku-area");

            var html = '<div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 tupload-item upload-item-more ">' +
                ' <img data-type="' + res.type + '" data-view_src="' + res.view_src + '" data-oss="' + res.oss_type + '" data-ext="' + res.ext + '" data-tmpname="' + res.tmpname + '" data-path="' + res.path + '" src="' + res.view_src + '" class="upload-item-pic" alt=""> ' +
                '<div class="item-foot-tools">' + res.tmpname +
                '</div> ' +
                '</div>';
            //插入数据
            parentObj.find(".upload-tuku-list").prepend(html);

        })
    }

    /**
     * 单文件上传
     * @param obj 触发上传对象
     * @param accept_type 可上传类型
     */
    function uploadOne(obj, accept_type) {
        //上传类型
        var upload_type = $(obj).data('type');
        //使用场景
        var screen_type = $(obj).data('screen_type');
        accept_type = accept_type || 'images';
        upload_type = upload_type || 'image';
        screen_type = screen_type || '';
        if (accept_type != 'images') {
            accept_type = 'file';
        }
        if ($(obj).data('accept_type')) {
            accept_type = $(obj).data('accept_type');
        }
        return uploadApi(obj, upload_type, screen_type, accept_type, function (res) {
            //找到父
            var parentObj = $(obj).parents(".layui-uploads-pic");
            console.log(parentObj);
            //找到图片显示区域
            parentObj.find(".upload-item").addClass('show');
            //图片给值
            parentObj.find(".upload-item .upload-item-pic").attr('src', res.view_src);
            //表单赋值
            parentObj.find(".upload-item .upload-item-field").val(res.path);
            parentObj.find('[kq-event="show_pic"]').data('src', res.view_src);
        })

    };

    /**
     * 多文件上传
     * @param obj 触发上传对象
     * @param accept_type 可上传类型
     */
    function uploadMore(obj, accept_type) {
        //一进来就计算更新的数量
        var parentObj = $(obj).parents(".layui-uploads-pic");
        jsonThumbs(parentObj);
        //上传类型
        var upload_type = $(obj).data('type');
        //使用场景
        var screen_type = $(obj).data('screen_type');
        accept_type = accept_type || 'images';
        upload_type = upload_type || 'image';
        screen_type = screen_type || '';
        if (accept_type != 'images') {
            accept_type = 'file';
        }

        return uploadApi(obj, upload_type, screen_type, accept_type, function (res) {
            //找到父
            var parentObj = $(obj).parents(".layui-uploads-pic");

            var html = '<div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 tupload-item upload-item-more ">' +
                ' <img data-type="' + res.type + '" data-view_src="' + res.view_src + '" data-oss="' + res.oss_type + '" data-ext="' + res.ext + '" data-tmpname="' + res.tmpname + '" data-src="' + res.path + '" src="' + res.view_src + '" class="upload-item-pic" alt=""> ' +
                '<div class="item-foot-tools">' +
                '<button type="button" class="layui-btn layui-btn-xs layui-btn-green js_left_pic"><i class=" ti-arrow-left"></i> </button>' +
                '<button type="button" class="layui-btn layui-btn-xs layui-btn-danger js_remove_pic">删除</button>' +
                '<button type="button" class="layui-btn layui-btn-xs layui-btn-green js_right_pic"><i class=" ti-arrow-right"></i> </button>' +
                '</div> ' +
                '</div>';
            //插入数据
            parentObj.find(".upload-item-upload-obj").before(html);
            jsonThumbs(parentObj);
        })

    };
    exports('uploader', uploader);
})