@extends('install.layout')

@section('content')
    <div class="layui-container">
        <div class="layui-row" style="margin-top: 20px">
            <div class="layui-col-sm12">
                <div class="layui-card">
                    <div class="layui-card-header">安装协议</div>
                    <div class="layui-card-body">

                        @klang('协议')
                        <div class="" style="margin-top: 20px">
                            <a href="{{ route('kongqi.install',['step'=>2]) }}" class="btn layui-btn">同意安装协议</a>
                            <a href="{{ url('/') }}" class="btn layui-btn  layui-btn-primary">不同意</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-index">

            <p>© 2019 <a href="//@kongqi('domain')">@kongqi('author')</a> MIT license</p>


    </div>


@endsection