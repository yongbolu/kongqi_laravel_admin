<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>安装KongQi Laravel Quick Admin快速后台开发</title>
    <link rel="stylesheet" href="{{ ___('/layui/css/layui.css') }}">
    <script src="{{ ___('/layui/layui.js') }}"></script>
    @yield('add_css')
    <style>
        .header {
            height: 59px;
            border-bottom: 1px solid #404553;
            background-color: #393D49;
        }

        .logo {

            margin: 10px;
            margin-top: 18px;

        }

        .logo img {
            width: 82px;

        }

        .header .layui-nav {
            float: left;
            right: 0;
            top: 0;
            padding: 0;
            background: none;
        }

        body {
            background-color: #f6f6f6;
        }

        caption {
            padding-top: 8px;
            padding-bottom: 8px;
            color: #777;
            text-align: left;
            font-size: 16px;
        }

        .text-danger {
            color: #FF00FF;
        }

        .footer {
            padding: 30px 0;
            line-height: 30px;
            text-align: center;
            color: #666;
            font-weight: 300;
            text-align: center;
        }

        .layui-main {
            display: flex;
            display: -webkit-flex;
        }

        .install_ok_btn {
            margin-top: 50px;
        }

        @media screen and (max-width: 768px) {
            .layui-main {
                width: 100%;
            }

            .layui-nav .layui-nav-item a {
                padding: 0 6px;
            }
        }

        .table-responsive {
            min-height: .01%;
            overflow-x: auto;
        }

        @media screen and (max-width: 768px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
        }
    </style>
</head>
<body>
@section('nav')
    @include('install.nav')
@show



@yield('content')
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function () {
        var element = layui.element;

        //…
    });
</script>
@yield('foot_js')
</body>
</html>