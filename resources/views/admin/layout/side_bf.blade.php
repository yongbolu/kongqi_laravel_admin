<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo">
            <span>@kongqi('system_name')</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
            lay-filter="layadmin-system-side-menu">

            @php
                $menu=admin_menu();

            @endphp
            @foreach($menu as $ik=>$item)
                @if(show_hide_menu_auth($item['name']))
                    <li data-name="{{ $item['name'] }}" class="layui-nav-item ">
                        <a href="{{ empty($item['_child'])?$item['name']?route($item['name']):'javascript:void(0)':'javascript:void(0)' }}"
                           lay-tips="{{ $item['cn_name'] }}" lay-direction="2">
                            <i class="{{ $item['icon'] }}"></i>
                            <cite>{{ $item['cn_name'] }}</cite>
                        </a>

                        @if(count($item['_child'])>0)
                            <dl class="layui-nav-child">
                                @foreach($item['_child'] as $sub_v)
                                    @if(show_hide_menu_auth($sub_v['name']))


                                        <dd data-name="{{ $sub_v['name'] }}" >
                                            <a lay-href="{{ route($sub_v['name']) }}">
                                                <i class="{{ $sub_v['icon'] }}"></i> {{ $sub_v['cn_name'] }}</a>
                                        </dd>

                                    @endif
                                @endforeach


                            </dl>
                        @endif

                    </li>
                @endif


            @endforeach
        </ul>


    </div>
</div>