@extends('admin.layout.base')
@section('add_css')

@endsection
@section('body')
    <body class="layui-layout-body">
    @endsection
    @section('layui_fluid')

    @endsection
    @section('layui_fluid_end')

    @endsection
    @section('content')
        <div id="LAY_app">
            <div class="layui-layout layui-layout-admin">
            @include('admin.layout.header')

            <!-- 侧边菜单 -->

            @include('admin.layout.side_plugin')
            <!-- 页面标签 -->
            @include('admin.layout.tab')


            <!-- 主体内容 -->
                <div class="layui-body" id="LAY_app_body">
                    <div class="layadmin-tabsbody-item layui-show">
                        <iframe src="{{ admin_url('Home','console') }}" frameborder="0"
                                class="layadmin-iframe"></iframe>
                    </div>
                </div>

                <!-- 辅助元素，一般用于移动设备下遮罩 -->
                <div class="layadmin-body-shade" layadmin-event="shade"></div>
            </div>
        </div>
    @endsection
    @section('add_js')

        <script>
            layui.config().use('index');
        </script>
@endsection