@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-form layui-form-kongqi" id="layuiadmin-form" id="layuiadmin-form">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <label for="" class="layui-form-label"><strong class="item-required">*</strong>父级</label>
            <div class="layui-input-block">
                <select name="parent_id" lay-search>
                    <option value="0">顶级权限</option>
                    @if(!empty($permissions))
                        @foreach($permissions as $perm)
                            <option value="{{$perm['id']}}" {{ isset($permission->id) && $perm['id'] == $permission->parent_id ? 'selected' : '' }} >{{$perm['cn_name']}}</option>
                            @if(isset($perm['_child']))
                                @foreach($perm['_child'] as $childs)
                                    <option value="{{$childs['id']}}" {{ isset($permission->id) && $childs['id'] == $permission->parent_id ? 'selected' : '' }} >┗━━{{$childs['cn_name']}}</option>
                                    @if(isset($childs['_child']))
                                        @foreach($childs['_child'] as $lastChilds)
                                            <option value="{{$lastChilds['id']}}" {{ isset($permission->id) && $lastChilds['id'] == $permission->parent_id ? 'selected' : '' }} >┗━━━━{{$lastChilds['cn_name']}}</option>
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
            'tips'=>'只需要前缀，例如管理组,admin.role即可',
            'value'=>'',
            'mark'=>'只需要前缀，例如管理组,admin.role即可',
            'rq'=>'rq'
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'cn_name',
            'title'=>'名称',
            'tips'=>'',
            'rq'=>'rq',
            'value'=>''
        ]])
        @include('admin.tpl.form.text',[
            'data'=>[
            'name'=>'menu_name',
            'title'=>'菜单名称',
            'tips'=>'',
            'rq'=>'rq',
            'value'=>''
        ]])
        @include('admin.tpl.form.icon',[
           'data'=>[
           'name'=>'icon',
           'title'=>'图标',
           'tips'=>'',
           'rq'=>'',
           'value'=>''
       ]])



        @include('admin.tpl.form.submit')


    </div>
@endsection
@section('foot_js')
    <script>
        var $='';
        layui.use(['index', 'uploader'], function () {
            $=layui.$;
            var uploader = layui.uploader;
            uploader.one("#thumbUpload");

        })
    </script>

@endsection