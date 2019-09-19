@extends('install.layout')

@section('content')
    <div class="layui-container">
        <div class="layui-row" style="margin-top: 20px">
            <div class="layui-col-sm12">
                <div class="layui-card">
                    <div class="layui-card-header">参数设置</div>
                    <div class="layui-card-body">
                        <form class="layui-form" action="{{ route('kongqi.install',['step'=>4]) }}" method="post">
                            @csrf
                            <table class="layui-table">
                                <tr>
                                    <td width="150">
                                        数据库类型
                                    </td>
                                    <td>
                                        <select name="DB[DB_CONNECTION]" lay-verify="required">
                                            <option value="mysql">mysql</option>
                                            <option value="sqlsrv">sqlsrv</option>
                                            <option value="sqlite">sqlite</option>
                                            <option value="pgsql">pgsql</option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库服务器
                                    </td>
                                    <td>
                                        <input type="text" NAME="DB[DB_HOST]" lay-verify="required" value="localhost"
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">如果服务器和MYSQL安装一起则使用localhost</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库端口
                                    </td>
                                    <td>
                                        <input type="text" lay-verify="required" name="DB[DB_PORT]" value="3306"
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">默认：3306</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库名
                                    </td>
                                    <td>
                                        <input type="text" lay-verify="required" name="DB[DB_DATABASE]" value=""
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">建立的表，请使用utf8mb4字符集</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库用户名
                                    </td>
                                    <td>
                                        <input type="text" lay-verify="required" name="DB[DB_USERNAME]" value=""
                                               class="layui-input">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库密码
                                    </td>
                                    <td>
                                        <input type="text" lay-verify="required" value="" name="DB[DB_PASSWORD]"
                                               class="layui-input">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        数据库前缀
                                    </td>
                                    <td>
                                        <input type="text"  name="DB[DB_PREFIX]" value=""
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">可为空</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Redis 服务器
                                    </td>
                                    <td>
                                        <input type="text"  name="REDIS[REDIS_HOST]"
                                               value="127.0.0.1" class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">如果没使用到Redis可为空</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Redis 密码
                                    </td>
                                    <td>
                                        <input type="text" name="REDIS[REDIS_PASSWORD]" value=""
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">如果没使用到Redis可为空，或密码本身为空</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Redis 端口
                                    </td>
                                    <td>
                                        <input type="text"  name="REDIS[REDIS_PORT]" value="6379"
                                               class="layui-input">
                                        <div class="layui-form-mid layui-word-aux">如果没使用到Redis可为空或6379默认</div>
                                    </td>
                                </tr>
                            </table>
                            <button class="layui-btn" lay-submit lay-filter="setDb">下一步</button><a class="layui-btn layui-btn-primary" href="{{ route('kongqi.install',['step'=>2]) }}">上一步</a>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('foot_js')
    @if (session('message'))
        <script>
            layui.use('layer',function(){
                let layer=layui.layer;
                layer.msg("{{ session('message') }}",{time:5000})
            })
        </script>
    @endif

    <script>
        layui.use(['layer', 'form'], function () {
            var form = layui.form;
            //监听提交

        })
    </script>


@endsection