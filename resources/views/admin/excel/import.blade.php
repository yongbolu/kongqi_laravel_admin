@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-form layui-form-kongqi" id="layuiadmin-form" id="layuiadmin-form">
        {{ csrf_field() }}
        <input type="hidden" name="model" value="{{ request()->input('model') }}">

      @include('admin.tpl.form.thumbPlace',[
        'data'=>[
            'name'=>'excel',
            'src'=>'',
            'show'=>0,
            'title'=>'选择表格',
            'tips'=>'',
            'rq'=>1,
            'place'=>1,
            'obj'=>'thumbUpload',
            'type'=>'excel'
        ]])
        @include('admin.tpl.form.radio',[
           'data'=>[
               'name'=>'del',
               'title'=>'删除原数据？',
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
        

        



        @include('admin.tpl.form.submit')


    </div>
@endsection
@section('foot_js')
    <script>
        layui.use(['index', 'uploader'], function () {
            var uploader = layui.uploader;
            uploader.one("#thumbUpload",'file');

        })
    </script>

@endsection