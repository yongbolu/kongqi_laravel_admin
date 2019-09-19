@extends('admin.layout.base')
@section('content')


    <div class="layadmin-tips">
        <i class="layui-icon" face=""></i>
        <div class="layui-text">
            <h1>
                <span class="layui-anim layui-anim-loop layui-anim-">4</span>
                <span class="layui-anim layui-anim-loop layui-anim-rotate">0</span>
                <span class="layui-anim layui-anim-loop layui-anim-">1</span>
            </h1>
            <p>{{ $message }}</p>
        </div>
    </div>
@endsection