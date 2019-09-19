@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-form layui-form-kongqi" id="layuiadmin-form" id="layuiadmin-form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('admin.tpl.form.text',[
             'data'=>[
             'name'=>'cn_name',
             'title'=>'角色名称',
             'tips'=>'',
             'value'=>$show->cn_name,
             'rq'=>'rq'
         ]])
        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'name',
            'title'=>'标识符',
            'tips'=>'',
            'rq'=>'rq|ename',
            'value'=>$show->name
        ]])
        @include('admin.tpl.form.textarea',[
           'data'=>[
           'name'=>'mark',
           'title'=>'描述说明',
           'tips'=>'可为空',
           'rq'=>'',
           'value'=>$show->mark
       ]])
        <div class="layui-form-item">
            <label class="layui-form-label">权限选择</label>
            <div class="layui-input-block">
                @include('admin.adminrole.permission')
            </div>
        </div>



        @include('admin.tpl.form.submit')


    </div>
@endsection
@section('foot_js')
    <script>
        layui.use(['index', 'uploader'], function () {
            var uploader = layui.uploader;
            uploader.one("#thumbUpload");

        })
    </script>

@endsection