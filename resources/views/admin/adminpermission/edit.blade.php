@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-form layui-form-kongqi" id="layuiadmin-form" id="layuiadmin-form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="layui-form-item">
            <label for="" class="layui-form-label"><strong class="item-required">*</strong>父级</label>
            <div class="layui-input-block">
                <select name="parent_id" lay-search>
                    <option value="0">顶级权限</option>
                    @if(!empty($permissions))
                        @foreach($permissions as $perm)
                            <option value="{{$perm['id']}}" {{ isset($show->id) && $perm['id'] == $show->parent_id ? 'selected' : '' }} >{{$perm['cn_name']}}</option>
                            @if(isset($perm['_child']))
                                @foreach($perm['_child'] as $childs)
                                    <option value="{{$childs['id']}}" {{ isset($show->id) && $childs['id'] == $show->parent_id ? 'selected' : '' }} >┗━━{{$childs['cn_name']}}</option>
                                    @if(isset($childs['_child']))
                                        @foreach($childs['_child'] as $lastChilds)
                                            <option value="{{$lastChilds['id']}}" {{ isset($show->id) && $lastChilds['id'] == $show->parent_id ? 'selected' : '' }} >┗━━━━{{$lastChilds['cn_name']}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'name',
            'title'=>'路由地址',
            'tips'=>'',
            'value'=>$show->name,
            'rq'=>'rq'
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'cn_name',
            'title'=>'名称',
            'tips'=>'',
            'rq'=>'rq',
            'value'=>$show->cn_name,
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'menu_name',
            'title'=>'菜单名称',
            'tips'=>'',
            'rq'=>'rq',
            'value'=>$show->menu_name,
        ]])
        @include('admin.tpl.form.icon',[
           'data'=>[
           'name'=>'icon',
           'title'=>'图标',
           'tips'=>'',
           'rq'=>'',
           'value'=>$show->icon
       ]])



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