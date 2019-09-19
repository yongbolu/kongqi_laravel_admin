@extends('install.layout')

@section('content')
    <div class="layui-container">
        <div class="layui-row" style="margin-top: 20px">
            <div class="layui-col-sm12">
                <div class="layui-card">
                    <div class="layui-card-header">@klang('环境检测')</div>
                    <div class="layui-card-body">
                        <div class="table-responsive">

                            <table class="layui-table table table-hover">
                                <caption><h4>@klang('运行环境检查')</h4></caption>
                                <thead>
                                <tr>
                                    <th>目录/文件</th>
                                    <th>所需状态</th>
                                    <th>当前状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($check_path as $k=>$item)
                                    <tr>
                                        <td>{{ $item['path'] }}</td>
                                        <td>可写</td>
                                        <td>{{$item['title']}} <i class="layui-icon {{$item['icon']}}"></i></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <present name="check_dirfile">
                            <table class="layui-table table table-hover">
                                <caption><h4>运行环境检查</h4></caption>
                                <thead>
                                <tr>
                                    <th>项目</th>
                                    <th>所需配置</th>
                                    <th>当前配置</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($check_env as $k=>$item)
                                    <tr>
                                        <td>{{$item['title'] }}</td>
                                        <td><i class="layui-icon layui-icon-ok text-success"></i> {{ $item['limit'] }}
                                        </td>
                                        <td><i class="layui-icon {{$item['icon']}}"></i> {{$item['current'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </present>
                        <table class="layui-table table table-hover">
                            <caption><h4>函数及扩展依赖性检查</h4></caption>
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>检查结果</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ext as $k=>$item)
                                <tr>
                                    <td>{{$item['name']}}</td>
                                    <td><i class="layui-icon {{$item['icon']}}"></i> {{$item['title']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="layui-btn  " href="{{ route('kongqi.install',['step'=>3]) }}">下一步</a>
                        <a class="layui-btn layui-btn-primary" href="{{ route('kongqi.install') }}">上一步</a>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('foot_js')

    @if (session('message'))
        <script>
            layui.use('layer', function () {
                let layer = layui.layer;
                layer.msg("{{ session('message') }}")
            })
        </script>
    @endif

@endsection