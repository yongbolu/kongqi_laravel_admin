@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-form layui-form-kongqi" id="layuiadmin-form" id="layuiadmin-form">
        {{ csrf_field() }}
        @include('admin.tpl.form.thumbPlace',[
        'data'=>[
            'name'=>'thumb',
            'src'=>'',
            'show'=>0,
            'title'=>'头像',
            'tips'=>'',
            'rq'=>'',
            'place'=>1,
            'obj'=>'thumbUpload'
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
                'name'=>'nickname',
                'title'=>'昵称',
                'tips'=>'',
                'value'=>'',
                'rq'=>'rq'
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
                'name'=>'account',
                'title'=>'账号',
                'tips'=>'',
                'rq'=>'rq|ename',
                'value'=>''
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
                'name'=>'password',
                'title'=>'密码',
                'tips'=>'',
                'rq'=>'rq',
                'mark'=>'不填表示不更新密码'
        ]])
        @include('admin.tpl.form.radio',[
           'data'=>[
               'name'=>'is_root',
               'title'=>'超级管理员',
               'tips'=>'',
               'rq'=>'',
               'on_id'=>0,
               'list'=>[
                   'type'=>'',
                   'data'=>[
                        ['id'=>1,'name'=>'是'],
                        ['id'=>0,'name'=>'否']
                   ]
               ]
       ]])
        @include('admin.tpl.form.checkbox',[
            'data'=>[
                'name'=>'roles',
                'title'=>'角色',
                'tips'=>'',
                'rq'=>'rq',
                'on_id'=>'',
                'list'=>[
                    'type'=>'',
                    'data'=>$role??[]
                ]
        ]])



        @include('admin.tpl.form.submit')


    </div>
@endsection
@section('foot_js')
    <script>
        layui.use(['index'], function () {



        })
    </script>

@endsection