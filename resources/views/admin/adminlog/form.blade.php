<div class="layui-card panel">
    <div class="layui-card-header">搜索
        <div class="panel-action">
            <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
    </div>
    <div class="layui-card-body">
        <div class="layui-form">
            <div class="layui-form-item">


                <div class="layui-inline">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-inline">
                        <input type="text" name="mark_like_query" placeholder="请输入描述" autocomplete="off"
                               class="layui-input">
                    </div>

                </div>

                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-admin" lay-submit lay-filter="LAY-list-search"
                            style="margin-left: 20px">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-list-btn">
        <button class="layui-btn kongqi-handel" data-type="all_del">删除</button>
        <button class="layui-btn kongqi-handel" data-type="add">添加</button>

    </div>
</div>