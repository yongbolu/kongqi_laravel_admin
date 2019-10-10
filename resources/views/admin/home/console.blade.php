@extends('admin.layout.base')
@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">版本信息</div>
            <div class="layui-card-body layui-text">
                <table class="layui-table">
                    <colgroup>
                        <col width="100">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>
                            系统名字
                        </td>
                        <td>
                            @kongqi('system_name') (@kongqi('system_desc'))
                        </td>
                    </tr>
                    <tr>
                        <td>当前版本</td>
                        <td>
                            <script type="text/html" template="">


                            </script>
                            @kongqi('system_version') <a href="//@kongqi('system_domain')" target="_blank"
                                                         style="padding-left: 15px;">更新日志</a>
                        </td>
                    </tr>
                    <tr>
                        <td>基于框架</td>
                        <td>
                            PHP + Laravel {{ app()->version() }}

                        </td>
                    </tr>
                    <tr>
                        <td>主要特色</td>
                        <td>@kongqi('feature')</td>
                    </tr>
                    <tr>
                        <td>许可</td>
                        <td style="padding-bottom: 0;">

                            准许MIT协议，允许你重新修改和包装，但需要保留版权信息。

                        </td>
                    </tr>
                    <tr>
                        <td>作者</td>
                        <td style="padding-bottom: 0;">

                            @kongqi('author')

                        </td>
                    </tr>
                    <tr>
                        <td>联系我</td>
                        <td style="padding-bottom: 0;">

                            <p>Mobile:@kongqi('mobile')</p>
                            <p>QQ: @kongqi('qq')</p>
                            <p>Email: @kongqi('qq')@qq.com</p>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">插件</div>
            <div class="layui-card-body layui-text">
                <iframe src="//market.kongqikeji.com/" height="400" frameborder="0" width="100%"></iframe>
            </div>
        </div>
    </div>
@endsection