@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="layui-card-body layui-text">
        <table class="layui-table">
            <colgroup>
                <col width="100">
                <col>
            </colgroup>
            <tbody>

            <tr>
                <td>名称</td>
                <td>
                    {{$show->name}}
                </td>
            </tr>
            <tr>
                <td>标识符</td>
                <td>
                    {{$show->ename}}
                </td>
            </tr>
            <tr>
                <td>插件地址</td>
                <td>
                    {{$show->domain_plugin ?: '无'}}
                </td>
            </tr>
            <tr>
                <td>插件演示地址</td>
                <td>
                    {{$show->domain_plugin_test ?: '无'}}
                </td>
            </tr>
            <tr>
                <td>简介</td>
                <td> {{ $show->intro }}</td>
            </tr>
            <tr>
                <td>当前版本</td>
                <td>
                    {{ $show->version }}
                </td>
            </tr>
            <tr>
                <td>作者</td>
                <td> {{ $show->author }}</td>
            </tr>
            <tr>
                <td>关于作者</td>
                <td> {{ $show->author_desc }}</td>
            </tr>
            <tr>
                <td>联系方式</td>
                <td>
                    <ul>
                        <li>QQ：{{ $show->qq }}</li>
                        <li>微信：{{ $show->weixin }}</li>
                        <li>手机：{{ $show->mobile }}</li>
                        <li>邮箱：{{ $show->email }}</li>
                        <li>主页：<a href="//{{$show->domain}}">{{$show->domain}}</a></li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('foot_js')
    <script>
        layui.use(['index'], function () {



        })
    </script>

@endsection