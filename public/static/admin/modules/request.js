layui.define(function (exports) {
    var $ = layui.jquery;
    var request = {
        ajax: function ajax(url, data, success, fail, complete, method, header, async) {
            data = data || {}
            header = header || {};
            method = method || 'post';
            async = async == 0 ? 0 : 1;
            data._token=$("[name='csrf-token']").attr('content');

            let headerObj = {};
            for (let i in header) {
                headerObj[i] = header[i];
            }
            $.ajax({
                data: data,
                headers: headerObj,
                async: async,    //表示请求是否异步处理
                type: method,    //请求类型
                url: url,//请求的 URL地址
                dataType: "json",//返回的数据类型
                success: function (res) {
                    return success && success(res)
                },
                error: function (res) {
                    return fail && fail(res)
                },
                complete(res) {

                    return complete && complete(res)
                }
            });

        } ,
        get:function (url, data, success, fail, complete, header, async) {
            async=async || 1
            data = data || {};
            return this.ajax(url, data, success, fail, complete, 'get',header,async);
        },
        post:function (url, data, success, fail, complete, header, async) {
            async=async || 1
            data = data || {};
            return this.ajax(url, data, success, fail, complete, 'post',header,async);
        }

    };

    //输出test接口
    exports('request', request);
});