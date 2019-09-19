@extends('admin.layout.base')
@section('add_css')
    <link rel="stylesheet" href="{{___('/admin/style/login.css')}}">
@endsection
@section('content')
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login">

        <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>@kongqi('system_name')</h2>
                <p>@kongqi('system_desc')</p>
            </div>
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                @csrf
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-username"
                           for="LAY-user-login-username"></label>
                    <input type="text" name="account" id="LAY-user-login-username" lay-verify="required"
                           placeholder="用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                           for="LAY-user-login-password"></label>
                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required"
                           placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-row">
                        <div class="layui-col-xs7">
                            <label class="layadmin-user-login-icon layui-icon layui-icon-vercode"
                                   for="LAY-user-login-vercode"></label>
                            <input type="text" name="captcha" id="LAY-user-login-vercode" lay-verify="required"
                                   placeholder="图形验证码" class="layui-input">
                        </div>
                        <div class="layui-col-xs5">
                            <div style="margin-left: 10px;">
                                <img src="{{ route('api.captcha',['type'=>3]) }}"
                                     data-src="{{ route('api.captcha',['type'=>3]) }}"
                                     class="layadmin-user-login-codeimg" id="LAY-user-get-vercode">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">

                </div>
                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
                </div>

            </div>
        </div>

        <div class="layui-trans layadmin-user-login-footer">

            <p>© 2012-{{ date('Y') }} <a href="@kongqi('domain')" target="_blank">@kongqi('domain')</a></p>

        </div>


    </div>

@endsection
@section('foot_js')
    <script>

        var postLoginUrl = '{{ route('admin.post.login') }}';

        layui.use([ 'index','form', 'verify','request'], function () {

            var $ = layui.$
                , request = layui.request
                , form = layui.form
                , layer = layui.layer;
            form.render();
            //提交
            form.on('submit(LAY-user-login-submit)', function (obj) {
                request.post(postLoginUrl, obj.field, function (res) {
                    if (res.code != 200) {
                        layer.msg(res.msg, {icon: 5, shift: 6});
                    }else
                    {
                        layer.msg(res.msg, {icon: 1, shift: 6});
                        location.href = res.data; //后台主页
                    }
                })

            });

            //更换图形验证码
            $("body").on('click', '#LAY-user-get-vercode', function () {
                var othis = $(this);
                this.src = othis.data('src') + '?t=' + new Date().getTime()
            });

        })
    </script>
@endsection