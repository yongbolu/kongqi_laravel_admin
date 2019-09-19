<div class="layui-card panel">
    <div class="layui-card-header">搜索
        <div class="panel-action">
            <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
    </div>
    <div class="layui-card-body">
        <input id="edt-search" class="layui-input" type="text" placeholder="输入关键字" style="width: 120px;float: left">
        <button class="layui-btn" id="btn-search">&nbsp;&nbsp;搜索&nbsp;&nbsp;</button>
    </div>
    <div class="layui-list-btn">

        <button class="layui-btn kongqi-handel" data-type="add" >添加</button>
        <button class="layui-btn kongqi-handel" data-type="diy_add" data-title="批量添加一组权限" data-w="800px" data-h="600px"
                data-url="{{ $all_create_url }}" data-post_url="{{ $all_post_url }}">
            批量添加一组权限</button>
        @include('admin.tpl.import')
        <div class="layui-btn-group">
            <button class="layui-btn" id="btn-expand">全部展开</button>
            <button class="layui-btn" id="btn-fold">全部折叠</button>
        </div>

    </div>
</div>