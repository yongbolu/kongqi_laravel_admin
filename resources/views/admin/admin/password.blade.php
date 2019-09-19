@extends('admin.layout.base')
@section('add_css')

@endsection
@section('content')
    <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-header">修改密码</div>
            <div class="layui-card-body" pad15="">

                <div class="layui-form layui-form-kongqi" lay-filter="">
                    {{ csrf_field() }}

                    @include('admin.tpl.form.text',[
                        'data'=>[
                            'name'=>'old_password',
                            'title'=>'输入旧密码',
                            'tips'=>'',
                            'rq'=>'rq',
                            'mark'=>''
                    ]])
                    @include('admin.tpl.form.text',[
                        'data'=>[
                            'name'=>'password',
                            'title'=>'输入新密码',
                            'tips'=>'',
                            'rq'=>'rq',
                            'mark'=>''
                    ]])






                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="password">确认修改</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('foot_js')
    <script>
        layui.use(['index','form','uploader'], function () {
            var $ = layui.$
                , jquery = $
                , form = layui.form


            var uploader = layui.uploader;
            uploader.one("#thumbUpload");
            form.on('submit(password)', function (obj) {
                //提交修改
                $.ajax({
                    url: '{{ action($controller.'@passwordPost') }}'
                    , method: 'post'
                    , data: obj.field
                    , success: function (res) {
                        layer.msg(res.msg);
                    }
                });

                return false;
            });


        });
    </script>

@endsection