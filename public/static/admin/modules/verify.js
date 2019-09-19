layui.define(['form'], function (exports) {
    var $ = layui.$,
        form = layui.form;

    form.verify({
        ename: function (value, item) { //value：表单的值、item：表单的DOM对象
            if (!new RegExp("^[a-zA-Z][a-zA-Z0-9_]*$").test(value)) {
                return '请使用英文字母开头字符';
            }

        },
        rq: function (value, item) { //value：表单的值、item：表单的DOM对象
            var title = $(item).data('title');
            if (!title) {
                //自动获取
                title = $(item).attr('placeholder');

                title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                if (!title) {
                    title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                }
                if (!title) {

                }
                if (!title) {
                    title = $(item).attr('tips');
                }


            }

            if (!value) {
                return '必填' + title;
            }

        },
        rq2: function (value, item) { //value：表单的值、item：表单的DOM对象
            var title = $(item).data('title');
            if (!title) {
                //自动获取
                title = $(item).attr('placeholder');
                if (!title) {
                    title = $(item).attr('tips');
                }



            }

            if (!value) {
                return '必填' + title;
            }

        },
        required: function (value, item) { //value：表单的值、item：表单的DOM对象
            var title = $(item).data('title');
            if (!title) {
                //自动获取
                title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                if (!title) {
                    title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                }
                if (!title) {
                    title = $(item).attr('placeholder');
                }
                if (!title) {
                    title = $(item).attr('tips');
                }


            }

            if (!value) {
                return '必填' + title;
            }

        },
        max_number: function (value, item) { //value：表单的值、item：表单的DOM对象
            var max2 = $(item).attr('max');

            value = parseInt(value);

            is_true = value > max2 ? 1 : 0;

            if (is_true) {

                return '不能超过' + max2;

            }


        },

        thumb: function (value, item) {

            var title = $(item).data('title');
            if (!title) {
                //自动获取
                title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                if (!title) {
                    title = $(item).parents('.layui-form-item').find('.layui-form-label').text();
                }
                if (!title) {
                    title = $(item).attr('placeholder');
                }
                if (!title) {
                    title = $(item).attr('tips');
                }

            }
            if (!value) {
                return '请上传' + title || '请上传必填图片';
            }


        },
        checkbox: function (value, item) {
            //获得checkbox的名字
            var checkbox_name = $(item).attr('name');
            var length = $(item).data('min');
            length = length || 1;//可以把上面第一种方案改成这种，更加优化
            var title = $(item).data('title');
            var size_length = $("[name='" + checkbox_name + "']:checked").length;
            if (size_length < length) {
                $(item).parent(".layui-input-block").addClass('layui-form-danger');
                return '请选择' + title + '最少' + length + '项' || '必填一项';
            }
        },
        radio: function (value, item) {
            //获得checkbox的名字
            var checkbox_name = $(item).attr('name');

            var title = $(item).data('title');
            var pline = $(item).parents('.layui-inline,.layui-form-item,.layui-input-block').find('.layui-form-label').text();
            title = title || pline;
            if (!title) {
                title = $(item).attr('placeholder');
            }
            if (!title) {
                title = $(item).attr('tips');
            }
            var size_length = $("[name='" + checkbox_name + "']:checked").length;
            if (!size_length) {
                $(item).parents(".layui-input-block").addClass('layui-form-danger');
                return '请选择' + title || '请选择';
            }
        },
        pass: [
            /^[\S]{6,12}$/, '密码必须6到12位，且不能出现空格'
        ],
        cnname: [
            /^[\u4e00-\u9fa5]+$/,
            '中文开头'
        ]

    });


    exports('verify', {});
});