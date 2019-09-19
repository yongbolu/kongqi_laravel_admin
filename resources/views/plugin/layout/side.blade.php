<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo">
            <span>@kongqi('system_name')</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
            lay-filter="layadmin-system-side-menu">

            @php
                $menu=config('admin_menu');
            @endphp
            @foreach($menu as $ik=>$item)
                @if($item['is_hide']!=1)
                    {{ $item['router'] }}
                    @if(show_hide_menu_auth($item['limit']))
                        <li data-name="{{ $item['name'] }}" class="layui-nav-item ">
                            <a href="{{ $item['router']?route($item['router'],isset($item['param'])?$item['param']:[]):'javascript:void(0)' }}"
                               lay-tips="{{ $item['name'] }}" lay-direction="2">
                                <i class="{{ $item['icon'] }}"></i>
                                <cite>{{ $item['name'] }}</cite>
                            </a>

                            @if(count($item['sub_menus'])>0)
                                <dl class="layui-nav-child">

                                    @foreach($item['sub_menus'] as $sub_v)
                                        @if(show_hide_menu_auth($sub_v['router']))
                                            @if($sub_v['is_hide']!=1)


                                                <dd data-name="{{ $sub_v['title'] }}">
                                                    <a lay-href="{{ route($sub_v['router'],isset($sub_v['param'])?$sub_v['param']:[]) }}">
                                                        <i class="{{ $sub_v['icon'] }}"></i> {{ $sub_v['title'] }}</a>
                                                </dd>

                                            @endif
                                        @endif
                                    @endforeach


                                </dl>

                            @endif
                        </li>

                    @endif
                @endif


            @endforeach
        </ul>


    </div>
</div>