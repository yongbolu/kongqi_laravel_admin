<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @section('title')
        <title>{{ $title ?? config('copyright.site_name') }}</title>
        <meta name="keywords" content="{{ $keyword ?? config('copyright.site_name') }}">
        <meta name="description" content="{{ $description??config('copyright.site_name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
    @section('theme_css')
        @include('admin.layout.common.theme')
    @show

    @yield('add_css')
    @section('font_css')
        <link rel="stylesheet" href="{{ ___('/themify-icons/themify-icons.css') }}">
    @show
</head>
<body>
@section('layui_fluid')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            @show
            @yield('content')
            @section('layui_fluid_end')
        </div>
    </div>
@show

@section('base_js')
    @include('plugin.layout.common.js')

    @include('plugin.layout.configJs')
    <script>
        //每个页面都初始化表单数据和检验表单
        layui.use(['index', 'form', 'verify','custorm'], function () {
            var $ = layui.$
                , form = layui.form;

        });
    </script>
@show
@yield('foot_js')
</body>
</html>