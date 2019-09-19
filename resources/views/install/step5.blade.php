@extends('install.layout')

@section('content')
    <div class="layui-container">
        <div class="layui-row" style="margin-top: 20px">
            <div class="layui-col-sm12">
                <div class="layui-card">
                    <div class="layui-card-header">安装完成</div>
                    <div class="layui-card-body" style="text-align: center;min-height: 500px">

                        <h2 style="margin: 30px;text-align: center">恭喜您，<span class="" style="color: #009688">@kongqi('system_name')</span>
                            安装完成！</h2>


                        <blockquote >后台管理员用户名 <span style="color: #009688">kongqi</span> 密码默认均为 <span style="color: #009688">kongqi1688</span>，请尽快登录系统进行修改，防止系统被恶意攻击。</blockquote>

                        <div class="install_ok_btn">
                            <a class="layui-btn layui-btn-primary" target="_blank" href="{{ route('admin.login') }}">登录后台</a>
                            <a class="layui-btn layui-btn-normal" target="_blank" href="/">访问首页</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('foot_js')


    <script>
        layui.use(['layer', 'form'], function () {
            var form = layui.form;
            //监听提交
            form.on('submit(setDb)', function (data) {
                console.log(data.field);
                return true;
            });
        })
    </script>


@endsection