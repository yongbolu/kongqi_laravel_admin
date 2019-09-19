<div class="layui-header header header-index">
    <div class="layui-main">
        <a class="logo" href="/">
            <img src="{{ ___('/install/logo.png') }}" alt="layui">
        </a>


        <ul class="layui-nav">
            @if(!empty($nav=config('copyright.installs')))
                @foreach($nav as $k=>$v)
                    <li class="layui-nav-item {{ $k==$index?'layui-nav-itemed':'' }}">
                        <a href="javascript:void(0)">{{ $v }}</a>
                    </li>
                    @endforeach
            @endif



        </ul>
        <div class="layui-nav">
            <li class="layui-nav-item ">
                <a href="//@kongqi('domain')" target="_blank">官网</a>
            </li>
        </div>
    </div>

</div>