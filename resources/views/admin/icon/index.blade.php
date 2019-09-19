@extends('admin.layout.baseDoing')
@section('add_css')
    <style>
        .icon-container {
            width: 20%;

            float: left;
            position: relative;
            text-align: center;
            height: 80px;
            line-height: 80px;
        }

        .icon-container span {
            display: block;
        }

        .icon-container span:first-child {
            font-size: 20px;
        }

        @media screen and (max-width: 768px) {
            .icon-container {
                width: 50%;
            }

            .site-doc-icon li {
                width: 120px;
            }
        }

        .icon-section h3 {
            padding: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
            <li class="layui-this">Layui图标</li>
            <li>Themify Icons</li>

        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <ul class="site-doc-icon">
                    <li>
                        <i class="layui-icon layui-icon-rate-half"></i>
                        <div class="doc-icon-name">半星</div>
                        <div class="doc-icon-code">&amp;#xe6c9;</div>
                        <div class="doc-icon-fontclass">layui-icon-rate-half</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-rate"></i>
                        <div class="doc-icon-name">星星-空心</div>
                        <div class="doc-icon-code">&amp;#xe67b;</div>
                        <div class="doc-icon-fontclass">layui-icon-rate</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-rate-solid"></i>
                        <div class="doc-icon-name">星星-实心</div>
                        <div class="doc-icon-code">&amp;#xe67a;</div>
                        <div class="doc-icon-fontclass">layui-icon-rate-solid</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-cellphone"></i>
                        <div class="doc-icon-name">手机</div>
                        <div class="doc-icon-code">&amp;#xe678;</div>
                        <div class="doc-icon-fontclass">layui-icon-cellphone</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-vercode"></i>
                        <div class="doc-icon-name">验证码</div>
                        <div class="doc-icon-code">&amp;#xe679;</div>
                        <div class="doc-icon-fontclass">layui-icon-vercode</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-login-wechat"></i>
                        <div class="doc-icon-name">微信</div>
                        <div class="doc-icon-code">&amp;#xe677;</div>
                        <div class="doc-icon-fontclass">layui-icon-login-wechat</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-login-qq"></i>
                        <div class="doc-icon-name">QQ</div>
                        <div class="doc-icon-code">&amp;#xe676;</div>
                        <div class="doc-icon-fontclass">layui-icon-login-qq</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-login-weibo"></i>
                        <div class="doc-icon-name">微博</div>
                        <div class="doc-icon-code">&amp;#xe675;</div>
                        <div class="doc-icon-fontclass">layui-icon-login-weibo</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-password"></i>
                        <div class="doc-icon-name">密码</div>
                        <div class="doc-icon-code">&amp;#xe673;</div>
                        <div class="doc-icon-fontclass">layui-icon-password</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-username"></i>
                        <div class="doc-icon-name">用户名</div>
                        <div class="doc-icon-code">&amp;#xe66f;</div>
                        <div class="doc-icon-fontclass">layui-icon-username</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-refresh-3"></i>
                        <div class="doc-icon-name">刷新-粗</div>
                        <div class="doc-icon-code">&amp;#xe9aa;</div>
                        <div class="doc-icon-fontclass">layui-icon-refresh-3</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-auz"></i>
                        <div class="doc-icon-name">授权</div>
                        <div class="doc-icon-code">&amp;#xe672;</div>
                        <div class="doc-icon-fontclass">layui-icon-auz</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-spread-left"></i>
                        <div class="doc-icon-name">左向右伸缩菜单</div>
                        <div class="doc-icon-code">&amp;#xe66b;</div>
                        <div class="doc-icon-fontclass">layui-icon-spread-left</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-shrink-right"></i>
                        <div class="doc-icon-name">右向左伸缩菜单</div>
                        <div class="doc-icon-code">&amp;#xe668;</div>
                        <div class="doc-icon-fontclass">layui-icon-shrink-right</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-snowflake"></i>
                        <div class="doc-icon-name">雪花</div>
                        <div class="doc-icon-code">&amp;#xe6b1;</div>
                        <div class="doc-icon-fontclass">layui-icon-snowflake</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-tips"></i>
                        <div class="doc-icon-name">提示说明</div>
                        <div class="doc-icon-code">&amp;#xe702;</div>
                        <div class="doc-icon-fontclass">layui-icon-tips</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-note"></i>
                        <div class="doc-icon-name">便签</div>
                        <div class="doc-icon-code">&amp;#xe66e;</div>
                        <div class="doc-icon-fontclass">layui-icon-note</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-home"></i>
                        <div class="doc-icon-name">主页</div>
                        <div class="doc-icon-code">&amp;#xe68e;</div>
                        <div class="doc-icon-fontclass">layui-icon-home</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-senior"></i>
                        <div class="doc-icon-name">高级</div>
                        <div class="doc-icon-code">&amp;#xe674;</div>
                        <div class="doc-icon-fontclass">layui-icon-senior</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-refresh"></i>
                        <div class="doc-icon-name">刷新</div>
                        <div class="doc-icon-code">&amp;#xe669;</div>
                        <div class="doc-icon-fontclass">layui-icon-refresh</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-refresh-1"></i>
                        <div class="doc-icon-name">刷新</div>
                        <div class="doc-icon-code">&amp;#xe666;</div>
                        <div class="doc-icon-fontclass">layui-icon-refresh-1</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-flag"></i>
                        <div class="doc-icon-name">旗帜</div>
                        <div class="doc-icon-code">&amp;#xe66c;</div>
                        <div class="doc-icon-fontclass">layui-icon-flag</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-theme"></i>
                        <div class="doc-icon-name">主题</div>
                        <div class="doc-icon-code">&amp;#xe66a;</div>
                        <div class="doc-icon-fontclass">layui-icon-theme</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-notice"></i>
                        <div class="doc-icon-name">消息-通知</div>
                        <div class="doc-icon-code">&amp;#xe667;</div>
                        <div class="doc-icon-fontclass">layui-icon-notice</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-website"></i>
                        <div class="doc-icon-name">网站</div>
                        <div class="doc-icon-code">&amp;#xe7ae;</div>
                        <div class="doc-icon-fontclass">layui-icon-website</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-console"></i>
                        <div class="doc-icon-name">控制台</div>
                        <div class="doc-icon-code">&amp;#xe665;</div>
                        <div class="doc-icon-fontclass">layui-icon-console</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-face-surprised"></i>
                        <div class="doc-icon-name">表情-惊讶</div>
                        <div class="doc-icon-code">&amp;#xe664;</div>
                        <div class="doc-icon-fontclass">layui-icon-face-surprised</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-set"></i>
                        <div class="doc-icon-name">设置-空心</div>
                        <div class="doc-icon-code">&amp;#xe716;</div>
                        <div class="doc-icon-fontclass">layui-icon-set</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-template-1"></i>
                        <div class="doc-icon-name">模板</div>
                        <div class="doc-icon-code">&amp;#xe656;</div>
                        <div class="doc-icon-fontclass">layui-icon-template-1</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-app"></i>
                        <div class="doc-icon-name">应用</div>
                        <div class="doc-icon-code">&amp;#xe653;</div>
                        <div class="doc-icon-fontclass">layui-icon-app</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-template"></i>
                        <div class="doc-icon-name">模板</div>
                        <div class="doc-icon-code">&amp;#xe663;</div>
                        <div class="doc-icon-fontclass">layui-icon-template</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-praise"></i>
                        <div class="doc-icon-name">赞</div>
                        <div class="doc-icon-code">&amp;#xe6c6;</div>
                        <div class="doc-icon-fontclass">layui-icon-praise</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-tread"></i>
                        <div class="doc-icon-name">踩</div>
                        <div class="doc-icon-code">&amp;#xe6c5;</div>
                        <div class="doc-icon-fontclass">layui-icon-tread</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-male"></i>
                        <div class="doc-icon-name">男</div>
                        <div class="doc-icon-code">&amp;#xe662;</div>
                        <div class="doc-icon-fontclass">layui-icon-male</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-female"></i>
                        <div class="doc-icon-name">女</div>
                        <div class="doc-icon-code">&amp;#xe661;</div>
                        <div class="doc-icon-fontclass">layui-icon-female</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-camera"></i>
                        <div class="doc-icon-name">相机-空心</div>
                        <div class="doc-icon-code">&amp;#xe660;</div>
                        <div class="doc-icon-fontclass">layui-icon-camera</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-camera-fill"></i>
                        <div class="doc-icon-name">相机-实心</div>
                        <div class="doc-icon-code">&amp;#xe65d;</div>
                        <div class="doc-icon-fontclass">layui-icon-camera-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-more"></i>
                        <div class="doc-icon-name">菜单-水平</div>
                        <div class="doc-icon-code">&amp;#xe65f;</div>
                        <div class="doc-icon-fontclass">layui-icon-more</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-more-vertical"></i>
                        <div class="doc-icon-name">菜单-垂直</div>
                        <div class="doc-icon-code">&amp;#xe671;</div>
                        <div class="doc-icon-fontclass">layui-icon-more-vertical</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-rmb"></i>
                        <div class="doc-icon-name">金额-人民币</div>
                        <div class="doc-icon-code">&amp;#xe65e;</div>
                        <div class="doc-icon-fontclass">layui-icon-rmb</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-dollar"></i>
                        <div class="doc-icon-name">金额-美元</div>
                        <div class="doc-icon-code">&amp;#xe659;</div>
                        <div class="doc-icon-fontclass">layui-icon-dollar</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-diamond"></i>
                        <div class="doc-icon-name">钻石-等级</div>
                        <div class="doc-icon-code">&amp;#xe735;</div>
                        <div class="doc-icon-fontclass">layui-icon-diamond</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-fire"></i>
                        <div class="doc-icon-name">火</div>
                        <div class="doc-icon-code">&amp;#xe756;</div>
                        <div class="doc-icon-fontclass">layui-icon-fire</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-return"></i>
                        <div class="doc-icon-name">返回</div>
                        <div class="doc-icon-code">&amp;#xe65c;</div>
                        <div class="doc-icon-fontclass">layui-icon-return</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-location"></i>
                        <div class="doc-icon-name">位置-地图</div>
                        <div class="doc-icon-code">&amp;#xe715;</div>
                        <div class="doc-icon-fontclass">layui-icon-location</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-read"></i>
                        <div class="doc-icon-name">办公-阅读</div>
                        <div class="doc-icon-code">&amp;#xe705;</div>
                        <div class="doc-icon-fontclass">layui-icon-read</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-survey"></i>
                        <div class="doc-icon-name">调查</div>
                        <div class="doc-icon-code">&amp;#xe6b2;</div>
                        <div class="doc-icon-fontclass">layui-icon-survey</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-face-smile"></i>
                        <div class="doc-icon-name">表情-微笑</div>
                        <div class="doc-icon-code">&amp;#xe6af;</div>
                        <div class="doc-icon-fontclass">layui-icon-face-smile</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-face-cry"></i>
                        <div class="doc-icon-name">表情-哭泣</div>
                        <div class="doc-icon-code">&amp;#xe69c;</div>
                        <div class="doc-icon-fontclass">layui-icon-face-cry</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-cart-simple"></i>
                        <div class="doc-icon-name">购物车</div>
                        <div class="doc-icon-code">&amp;#xe698;</div>
                        <div class="doc-icon-fontclass">layui-icon-cart-simple</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-cart"></i>
                        <div class="doc-icon-name">购物车</div>
                        <div class="doc-icon-code">&amp;#xe657;</div>
                        <div class="doc-icon-fontclass">layui-icon-cart</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-next"></i>
                        <div class="doc-icon-name">下一页</div>
                        <div class="doc-icon-code">&amp;#xe65b;</div>
                        <div class="doc-icon-fontclass">layui-icon-next</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-prev"></i>
                        <div class="doc-icon-name">上一页</div>
                        <div class="doc-icon-code">&amp;#xe65a;</div>
                        <div class="doc-icon-fontclass">layui-icon-prev</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-upload-drag"></i>
                        <div class="doc-icon-name">上传-空心-拖拽</div>
                        <div class="doc-icon-code">&amp;#xe681;</div>
                        <div class="doc-icon-fontclass">layui-icon-upload-drag</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-upload"></i>
                        <div class="doc-icon-name">上传-实心</div>
                        <div class="doc-icon-code">&amp;#xe67c;</div>
                        <div class="doc-icon-fontclass">layui-icon-upload</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-download-circle"></i>
                        <div class="doc-icon-name">下载-圆圈</div>
                        <div class="doc-icon-code">&amp;#xe601;</div>
                        <div class="doc-icon-fontclass">layui-icon-download-circle</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-component"></i>
                        <div class="doc-icon-name">组件</div>
                        <div class="doc-icon-code">&amp;#xe857;</div>
                        <div class="doc-icon-fontclass">layui-icon-component</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-file-b"></i>
                        <div class="doc-icon-name">文件-粗</div>
                        <div class="doc-icon-code">&amp;#xe655;</div>
                        <div class="doc-icon-fontclass">layui-icon-file-b</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-user"></i>
                        <div class="doc-icon-name">用户</div>
                        <div class="doc-icon-code">&amp;#xe770;</div>
                        <div class="doc-icon-fontclass">layui-icon-user</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-find-fill"></i>
                        <div class="doc-icon-name">发现-实心</div>
                        <div class="doc-icon-code">&amp;#xe670;</div>
                        <div class="doc-icon-fontclass">layui-icon-find-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-loading layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i>
                        <div class="doc-icon-name">loading</div>
                        <div class="doc-icon-code">&amp;#xe63d;</div>
                        <div class="doc-icon-fontclass">layui-icon-loading</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i>
                        <div class="doc-icon-name">loading</div>
                        <div class="doc-icon-code">&amp;#xe63e;</div>
                        <div class="doc-icon-fontclass">layui-icon-loading-1</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-add-1"></i>
                        <div class="doc-icon-name">添加</div>
                        <div class="doc-icon-code">&amp;#xe654;</div>
                        <div class="doc-icon-fontclass">layui-icon-add-1</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-play"></i>
                        <div class="doc-icon-name">播放</div>
                        <div class="doc-icon-code">&amp;#xe652;</div>
                        <div class="doc-icon-fontclass">layui-icon-play</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-pause"></i>
                        <div class="doc-icon-name">暂停</div>
                        <div class="doc-icon-code">&amp;#xe651;</div>
                        <div class="doc-icon-fontclass">layui-icon-pause</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-headset"></i>
                        <div class="doc-icon-name">音频-耳机</div>
                        <div class="doc-icon-code">&amp;#xe6fc;</div>
                        <div class="doc-icon-fontclass">layui-icon-headset</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-video"></i>
                        <div class="doc-icon-name">视频</div>
                        <div class="doc-icon-code">&amp;#xe6ed;</div>
                        <div class="doc-icon-fontclass">layui-icon-video</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-voice"></i>
                        <div class="doc-icon-name">语音-声音</div>
                        <div class="doc-icon-code">&amp;#xe688;</div>
                        <div class="doc-icon-fontclass">layui-icon-voice</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-speaker"></i>
                        <div class="doc-icon-name">消息-通知-喇叭</div>
                        <div class="doc-icon-code">&amp;#xe645;</div>
                        <div class="doc-icon-fontclass">layui-icon-speaker</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-fonts-del"></i>
                        <div class="doc-icon-name">删除线</div>
                        <div class="doc-icon-code">&amp;#xe64f;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-del</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-fonts-code"></i>
                        <div class="doc-icon-name">代码</div>
                        <div class="doc-icon-code">&amp;#xe64e;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-code</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-fonts-html"></i>
                        <div class="doc-icon-name">HTML</div>
                        <div class="doc-icon-code">&amp;#xe64b;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-html</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-fonts-strong"></i>
                        <div class="doc-icon-name">字体加粗</div>
                        <div class="doc-icon-code">&amp;#xe62b;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-strong</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-unlink"></i>
                        <div class="doc-icon-name">删除链接</div>
                        <div class="doc-icon-code">&amp;#xe64d;</div>
                        <div class="doc-icon-fontclass">layui-icon-unlink</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-picture"></i>
                        <div class="doc-icon-name">图片</div>
                        <div class="doc-icon-code">&amp;#xe64a;</div>
                        <div class="doc-icon-fontclass">layui-icon-picture</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-link"></i>
                        <div class="doc-icon-name">链接</div>
                        <div class="doc-icon-code">&amp;#xe64c;</div>
                        <div class="doc-icon-fontclass">layui-icon-link</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-face-smile-b"></i>
                        <div class="doc-icon-name">表情-笑-粗</div>
                        <div class="doc-icon-code">&amp;#xe650;</div>
                        <div class="doc-icon-fontclass">layui-icon-face-smile-b</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-align-left"></i>
                        <div class="doc-icon-name">左对齐</div>
                        <div class="doc-icon-code">&amp;#xe649;</div>
                        <div class="doc-icon-fontclass">layui-icon-align-left</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-align-right"></i>
                        <div class="doc-icon-name">右对齐</div>
                        <div class="doc-icon-code">&amp;#xe648;</div>
                        <div class="doc-icon-fontclass">layui-icon-align-right</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-align-center"></i>
                        <div class="doc-icon-name">居中对齐</div>
                        <div class="doc-icon-code">&amp;#xe647;</div>
                        <div class="doc-icon-fontclass">layui-icon-align-center</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-fonts-u"></i>
                        <div class="doc-icon-name">字体-下划线</div>
                        <div class="doc-icon-code">&amp;#xe646;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-u</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-fonts-i"></i>
                        <div class="doc-icon-name">字体-斜体</div>
                        <div class="doc-icon-code">&amp;#xe644;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-i</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-tabs"></i>
                        <div class="doc-icon-name">Tabs 选项卡</div>
                        <div class="doc-icon-code">&amp;#xe62a;</div>
                        <div class="doc-icon-fontclass">layui-icon-tabs</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-radio"></i>
                        <div class="doc-icon-name">单选框-选中</div>
                        <div class="doc-icon-code">&amp;#xe643;</div>
                        <div class="doc-icon-fontclass">layui-icon-radio</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-circle"></i>
                        <div class="doc-icon-name">单选框-候选</div>
                        <div class="doc-icon-code">&amp;#xe63f;</div>
                        <div class="doc-icon-fontclass">layui-icon-circle</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-edit"></i>
                        <div class="doc-icon-name">编辑</div>
                        <div class="doc-icon-code">&amp;#xe642;</div>
                        <div class="doc-icon-fontclass">layui-icon-edit</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-share"></i>
                        <div class="doc-icon-name">分享</div>
                        <div class="doc-icon-code">&amp;#xe641;</div>
                        <div class="doc-icon-fontclass">layui-icon-share</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-delete"></i>
                        <div class="doc-icon-name">删除</div>
                        <div class="doc-icon-code">&amp;#xe640;</div>
                        <div class="doc-icon-fontclass">layui-icon-delete</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-form"></i>
                        <div class="doc-icon-name">表单</div>
                        <div class="doc-icon-code">&amp;#xe63c;</div>
                        <div class="doc-icon-fontclass">layui-icon-form</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-cellphone-fine"></i>
                        <div class="doc-icon-name">手机-细体</div>
                        <div class="doc-icon-code">&amp;#xe63b;</div>
                        <div class="doc-icon-fontclass">layui-icon-cellphone-fine</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-dialogue"></i>
                        <div class="doc-icon-name">聊天 对话 沟通</div>
                        <div class="doc-icon-code">&amp;#xe63a;</div>
                        <div class="doc-icon-fontclass">layui-icon-dialogue</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-fonts-clear"></i>
                        <div class="doc-icon-name">文字格式化</div>
                        <div class="doc-icon-code">&amp;#xe639;</div>
                        <div class="doc-icon-fontclass">layui-icon-fonts-clear</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-layer"></i>
                        <div class="doc-icon-name">窗口</div>
                        <div class="doc-icon-code">&amp;#xe638;</div>
                        <div class="doc-icon-fontclass">layui-icon-layer</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-date"></i>
                        <div class="doc-icon-name">日期</div>
                        <div class="doc-icon-code">&amp;#xe637;</div>
                        <div class="doc-icon-fontclass">layui-icon-date</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-water"></i>
                        <div class="doc-icon-name">水 下雨</div>
                        <div class="doc-icon-code">&amp;#xe636;</div>
                        <div class="doc-icon-fontclass">layui-icon-water</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-code-circle"></i>
                        <div class="doc-icon-name">代码-圆圈</div>
                        <div class="doc-icon-code">&amp;#xe635;</div>
                        <div class="doc-icon-fontclass">layui-icon-code-circle</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-carousel"></i>
                        <div class="doc-icon-name">轮播组图</div>
                        <div class="doc-icon-code">&amp;#xe634;</div>
                        <div class="doc-icon-fontclass">layui-icon-carousel</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-prev-circle"></i>
                        <div class="doc-icon-name">翻页</div>
                        <div class="doc-icon-code">&amp;#xe633;</div>
                        <div class="doc-icon-fontclass">layui-icon-prev-circle</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-layouts"></i>
                        <div class="doc-icon-name">布局</div>
                        <div class="doc-icon-code">&amp;#xe632;</div>
                        <div class="doc-icon-fontclass">layui-icon-layouts</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-util"></i>
                        <div class="doc-icon-name">工具</div>
                        <div class="doc-icon-code">&amp;#xe631;</div>
                        <div class="doc-icon-fontclass">layui-icon-util</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-templeate-1"></i>
                        <div class="doc-icon-name">选择模板</div>
                        <div class="doc-icon-code">&amp;#xe630;</div>
                        <div class="doc-icon-fontclass">layui-icon-templeate-1</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-upload-circle"></i>
                        <div class="doc-icon-name">上传-圆圈</div>
                        <div class="doc-icon-code">&amp;#xe62f;</div>
                        <div class="doc-icon-fontclass">layui-icon-upload-circle</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-tree"></i>
                        <div class="doc-icon-name">树</div>
                        <div class="doc-icon-code">&amp;#xe62e;</div>
                        <div class="doc-icon-fontclass">layui-icon-tree</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-table"></i>
                        <div class="doc-icon-name">表格</div>
                        <div class="doc-icon-code">&amp;#xe62d;</div>
                        <div class="doc-icon-fontclass">layui-icon-table</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-chart"></i>
                        <div class="doc-icon-name">图表</div>
                        <div class="doc-icon-code">&amp;#xe62c;</div>
                        <div class="doc-icon-fontclass">layui-icon-chart</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-chart-screen"></i>
                        <div class="doc-icon-name">图标 报表 屏幕</div>
                        <div class="doc-icon-code">&amp;#xe629;</div>
                        <div class="doc-icon-fontclass">layui-icon-chart-screen</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-engine"></i>
                        <div class="doc-icon-name">引擎</div>
                        <div class="doc-icon-code">&amp;#xe628;</div>
                        <div class="doc-icon-fontclass">layui-icon-engine</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-triangle-d"></i>
                        <div class="doc-icon-name">下三角</div>
                        <div class="doc-icon-code">&amp;#xe625;</div>
                        <div class="doc-icon-fontclass">layui-icon-triangle-d</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-triangle-r"></i>
                        <div class="doc-icon-name">右三角</div>
                        <div class="doc-icon-code">&amp;#xe623;</div>
                        <div class="doc-icon-fontclass">layui-icon-triangle-r</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-file"></i>
                        <div class="doc-icon-name">文件</div>
                        <div class="doc-icon-code">&amp;#xe621;</div>
                        <div class="doc-icon-fontclass">layui-icon-file</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-set-sm"></i>
                        <div class="doc-icon-name">设置-小型</div>
                        <div class="doc-icon-code">&amp;#xe620;</div>
                        <div class="doc-icon-fontclass">layui-icon-set-sm</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-add-circle"></i>
                        <div class="doc-icon-name">添加-圆圈</div>
                        <div class="doc-icon-code">&amp;#xe61f;</div>
                        <div class="doc-icon-fontclass">layui-icon-add-circle</div>
                    </li>


                    <li>
                        <i class="layui-icon layui-icon-404"></i>
                        <div class="doc-icon-name">404</div>
                        <div class="doc-icon-code">&amp;#xe61c;</div>
                        <div class="doc-icon-fontclass">layui-icon-404</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-about"></i>
                        <div class="doc-icon-name">关于</div>
                        <div class="doc-icon-code">&amp;#xe60b;</div>
                        <div class="doc-icon-fontclass">layui-icon-about</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-up"></i>
                        <div class="doc-icon-name">箭头 向上</div>
                        <div class="doc-icon-code">&amp;#xe619;</div>
                        <div class="doc-icon-fontclass">layui-icon-up</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-down"></i>
                        <div class="doc-icon-name">箭头 向下</div>
                        <div class="doc-icon-code">&amp;#xe61a;</div>
                        <div class="doc-icon-fontclass">layui-icon-down</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-left"></i>
                        <div class="doc-icon-name">箭头 向左</div>
                        <div class="doc-icon-code">&amp;#xe603;</div>
                        <div class="doc-icon-fontclass">layui-icon-left</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-right"></i>
                        <div class="doc-icon-name">箭头 向右</div>
                        <div class="doc-icon-code">&amp;#xe602;</div>
                        <div class="doc-icon-fontclass">layui-icon-right</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-circle-dot"></i>
                        <div class="doc-icon-name">圆点</div>
                        <div class="doc-icon-code">&amp;#xe617;</div>
                        <div class="doc-icon-fontclass">layui-icon-circle-dot</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-search"></i>
                        <div class="doc-icon-name">搜索</div>
                        <div class="doc-icon-code">&amp;#xe615;</div>
                        <div class="doc-icon-fontclass">layui-icon-search</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-set-fill"></i>
                        <div class="doc-icon-name">设置-实心</div>
                        <div class="doc-icon-code">&amp;#xe614;</div>
                        <div class="doc-icon-fontclass">layui-icon-set-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-group"></i>
                        <div class="doc-icon-name">群组</div>
                        <div class="doc-icon-code">&amp;#xe613;</div>
                        <div class="doc-icon-fontclass">layui-icon-group</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-friends"></i>
                        <div class="doc-icon-name">好友</div>
                        <div class="doc-icon-code">&amp;#xe612;</div>
                        <div class="doc-icon-fontclass">layui-icon-friends</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-reply-fill"></i>
                        <div class="doc-icon-name">回复 评论 实心</div>
                        <div class="doc-icon-code">&amp;#xe611;</div>
                        <div class="doc-icon-fontclass">layui-icon-reply-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-menu-fill"></i>
                        <div class="doc-icon-name">菜单 隐身 实心</div>
                        <div class="doc-icon-code">&amp;#xe60f;</div>
                        <div class="doc-icon-fontclass">layui-icon-menu-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-log"></i>
                        <div class="doc-icon-name">记录</div>
                        <div class="doc-icon-code">&amp;#xe60e;</div>
                        <div class="doc-icon-fontclass">layui-icon-log</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-picture-fine"></i>
                        <div class="doc-icon-name">图片-细体</div>
                        <div class="doc-icon-code">&amp;#xe60d;</div>
                        <div class="doc-icon-fontclass">layui-icon-picture-fine</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-face-smile-fine"></i>
                        <div class="doc-icon-name">表情-笑-细体</div>
                        <div class="doc-icon-code">&amp;#xe60c;</div>
                        <div class="doc-icon-fontclass">layui-icon-face-smile-fine</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-list"></i>
                        <div class="doc-icon-name">列表</div>
                        <div class="doc-icon-code">&amp;#xe60a;</div>
                        <div class="doc-icon-fontclass">layui-icon-list</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-release"></i>
                        <div class="doc-icon-name">发布 纸飞机</div>
                        <div class="doc-icon-code">&amp;#xe609;</div>
                        <div class="doc-icon-fontclass">layui-icon-release</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-ok"></i>
                        <div class="doc-icon-name">对 OK</div>
                        <div class="doc-icon-code">&amp;#xe605;</div>
                        <div class="doc-icon-fontclass">layui-icon-ok</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-help"></i>
                        <div class="doc-icon-name">帮助</div>
                        <div class="doc-icon-code">&amp;#xe607;</div>
                        <div class="doc-icon-fontclass">layui-icon-help</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-chat"></i>
                        <div class="doc-icon-name">客服</div>
                        <div class="doc-icon-code">&amp;#xe606;</div>
                        <div class="doc-icon-fontclass">layui-icon-chat</div>
                    </li>

                    <li>
                        <i class="layui-icon layui-icon-top"></i>
                        <div class="doc-icon-name">top 置顶</div>
                        <div class="doc-icon-code">&amp;#xe604;</div>
                        <div class="doc-icon-fontclass">layui-icon-top</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-star"></i>
                        <div class="doc-icon-name">收藏-空心</div>
                        <div class="doc-icon-code">&amp;#xe600;</div>
                        <div class="doc-icon-fontclass">layui-icon-star</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-star-fill"></i>
                        <div class="doc-icon-name">收藏-实心</div>
                        <div class="doc-icon-code">&amp;#xe658;</div>
                        <div class="doc-icon-fontclass">layui-icon-star-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-close-fill"></i>
                        <div class="doc-icon-name">关闭-实心</div>
                        <div class="doc-icon-code">&amp;#x1007;</div>
                        <div class="doc-icon-fontclass">layui-icon-close-fill</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-close"></i>
                        <div class="doc-icon-name">关闭-空心</div>
                        <div class="doc-icon-code">&amp;#x1006;</div>
                        <div class="doc-icon-fontclass">layui-icon-close</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-ok-circle"></i>
                        <div class="doc-icon-name">正确</div>
                        <div class="doc-icon-code">&amp;#x1005;</div>
                        <div class="doc-icon-fontclass">layui-icon-ok-circle</div>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-add-circle-fine"></i>
                        <div class="doc-icon-name">添加-圆圈-细体</div>
                        <div class="doc-icon-code">&amp;#xe608;</div>
                        <div class="doc-icon-fontclass">layui-icon-add-circle-fine</div>
                    </li>
                </ul>
            </div>
            <div class="layui-tab-item">
                <div class="icon-section">

                    <div class="icon-section">
                        <h3>Arrows &amp; Direction Icons </h3>

                        <div class="icon-container">
                            <span class="ti-arrow-up"></span><span class="icon-name"> ti-arrow-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-right"></span><span class="icon-name"> ti-arrow-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-left"></span><span class="icon-name"> ti-arrow-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-down"></span><span class="icon-name"> ti-arrow-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrows-vertical"></span><span class="icon-name"> ti-arrows-vertical</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrows-horizontal"></span><span
                                    class="icon-name"> ti-arrows-horizontal</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-up"></span><span class="icon-name"> ti-angle-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-right"></span><span class="icon-name"> ti-angle-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-left"></span><span class="icon-name"> ti-angle-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-down"></span><span class="icon-name"> ti-angle-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-double-up"></span><span class="icon-name"> ti-angle-double-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-double-right"></span><span
                                    class="icon-name"> ti-angle-double-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-double-left"></span><span
                                    class="icon-name"> ti-angle-double-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-angle-double-down"></span><span
                                    class="icon-name"> ti-angle-double-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-move"></span><span class="icon-name"> ti-move</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-fullscreen"></span><span class="icon-name"> ti-fullscreen</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-top-right"></span><span class="icon-name"> ti-arrow-top-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-top-left"></span><span class="icon-name"> ti-arrow-top-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-circle-up"></span><span class="icon-name"> ti-arrow-circle-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-circle-right"></span><span
                                    class="icon-name"> ti-arrow-circle-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-circle-left"></span><span
                                    class="icon-name"> ti-arrow-circle-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrow-circle-down"></span><span
                                    class="icon-name"> ti-arrow-circle-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-arrows-corner"></span><span class="icon-name"> ti-arrows-corner</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-split-v"></span><span class="icon-name"> ti-split-v</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-split-v-alt"></span><span class="icon-name"> ti-split-v-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-split-h"></span><span class="icon-name"> ti-split-h</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-point-up"></span><span class="icon-name"> ti-hand-point-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-point-right"></span><span class="icon-name"> ti-hand-point-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-point-left"></span><span class="icon-name"> ti-hand-point-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-point-down"></span><span class="icon-name"> ti-hand-point-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-back-right"></span><span class="icon-name"> ti-back-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-back-left"></span><span class="icon-name"> ti-back-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-exchange-vertical"></span><span
                                    class="icon-name"> ti-exchange-vertical</span>
                        </div>

                    </div> <!-- Arrows Icons -->


                    <h3>Web App Icons</h3>

                    <div class="icon-section">

                        <div class="icon-container">
                            <span class="ti-wand"></span><span class="icon-name"> ti-wand</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-save"></span><span class="icon-name"> ti-save</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-save-alt"></span><span class="icon-name"> ti-save-alt</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-direction"></span><span class="icon-name"> ti-direction</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-direction-alt"></span><span class="icon-name"> ti-direction-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-user"></span><span class="icon-name"> ti-user</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-link"></span><span class="icon-name"> ti-link</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-unlink"></span><span class="icon-name"> ti-unlink</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-trash"></span><span class="icon-name"> ti-trash</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-target"></span><span class="icon-name"> ti-target</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-tag"></span><span class="icon-name"> ti-tag</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-desktop"></span><span class="icon-name"> ti-desktop</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-tablet"></span><span class="icon-name"> ti-tablet</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-mobile"></span><span class="icon-name"> ti-mobile</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-email"></span><span class="icon-name"> ti-email</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-star"></span><span class="icon-name"> ti-star</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-spray"></span><span class="icon-name"> ti-spray</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-signal"></span><span class="icon-name"> ti-signal</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shopping-cart"></span><span class="icon-name"> ti-shopping-cart</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shopping-cart-full"></span><span
                                    class="icon-name"> ti-shopping-cart-full</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-settings"></span><span class="icon-name"> ti-settings</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-search"></span><span class="icon-name"> ti-search</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-zoom-in"></span><span class="icon-name"> ti-zoom-in</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-zoom-out"></span><span class="icon-name"> ti-zoom-out</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-cut"></span><span class="icon-name"> ti-cut</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-ruler"></span><span class="icon-name"> ti-ruler</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-ruler-alt-2"></span><span class="icon-name"> ti-ruler-alt-2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-ruler-pencil"></span><span class="icon-name"> ti-ruler-pencil</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-ruler-alt"></span><span class="icon-name"> ti-ruler-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bookmark"></span><span class="icon-name"> ti-bookmark</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bookmark-alt"></span><span class="icon-name"> ti-bookmark-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-reload"></span><span class="icon-name"> ti-reload</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-plus"></span><span class="icon-name"> ti-plus</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-minus"></span><span class="icon-name"> ti-minus</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-close"></span><span class="icon-name"> ti-close</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pin"></span><span class="icon-name"> ti-pin</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pencil"></span><span class="icon-name"> ti-pencil</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-pencil-alt"></span><span class="icon-name"> ti-pencil-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-paint-roller"></span><span class="icon-name"> ti-paint-roller</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-paint-bucket"></span><span class="icon-name"> ti-paint-bucket</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-na"></span><span class="icon-name"> ti-na</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-medall"></span><span class="icon-name"> ti-medall</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-medall-alt"></span><span class="icon-name"> ti-medall-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-marker"></span><span class="icon-name"> ti-marker</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-marker-alt"></span><span class="icon-name"> ti-marker-alt</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-lock"></span><span class="icon-name"> ti-lock</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-unlock"></span><span class="icon-name"> ti-unlock</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-location-arrow"></span><span class="icon-name"> ti-location-arrow</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout"></span><span class="icon-name"> ti-layout</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layers"></span><span class="icon-name"> ti-layers</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layers-alt"></span><span class="icon-name"> ti-layers-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-key"></span><span class="icon-name"> ti-key</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-image"></span><span class="icon-name"> ti-image</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-heart"></span><span class="icon-name"> ti-heart</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-heart-broken"></span><span class="icon-name"> ti-heart-broken</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-stop"></span><span class="icon-name"> ti-hand-stop</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-open"></span><span class="icon-name"> ti-hand-open</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hand-drag"></span><span class="icon-name"> ti-hand-drag</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-flag"></span><span class="icon-name"> ti-flag</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-flag-alt"></span><span class="icon-name"> ti-flag-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-flag-alt-2"></span><span class="icon-name"> ti-flag-alt-2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-eye"></span><span class="icon-name"> ti-eye</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-import"></span><span class="icon-name"> ti-import</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-export"></span><span class="icon-name"> ti-export</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-cup"></span><span class="icon-name"> ti-cup</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-crown"></span><span class="icon-name"> ti-crown</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-comments"></span><span class="icon-name"> ti-comments</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-comment"></span><span class="icon-name"> ti-comment</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-comment-alt"></span><span class="icon-name"> ti-comment-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-thought"></span><span class="icon-name"> ti-thought</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-clip"></span><span class="icon-name"> ti-clip</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-check"></span><span class="icon-name"> ti-check</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-check-box"></span><span class="icon-name"> ti-check-box</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-camera"></span><span class="icon-name"> ti-camera</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-announcement"></span><span class="icon-name"> ti-announcement</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-brush"></span><span class="icon-name"> ti-brush</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-brush-alt"></span><span class="icon-name"> ti-brush-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-palette"></span><span class="icon-name"> ti-palette</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-briefcase"></span><span class="icon-name"> ti-briefcase</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bolt"></span><span class="icon-name"> ti-bolt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bolt-alt"></span><span class="icon-name"> ti-bolt-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-blackboard"></span><span class="icon-name"> ti-blackboard</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bag"></span><span class="icon-name"> ti-bag</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-world"></span><span class="icon-name"> ti-world</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-wheelchair"></span><span class="icon-name"> ti-wheelchair</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-car"></span><span class="icon-name"> ti-car</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-truck"></span><span class="icon-name"> ti-truck</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-timer"></span><span class="icon-name"> ti-timer</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-ticket"></span><span class="icon-name"> ti-ticket</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-thumb-up"></span><span class="icon-name"> ti-thumb-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-thumb-down"></span><span class="icon-name"> ti-thumb-down</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-stats-up"></span><span class="icon-name"> ti-stats-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-stats-down"></span><span class="icon-name"> ti-stats-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shine"></span><span class="icon-name"> ti-shine</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shift-right"></span><span class="icon-name"> ti-shift-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shift-left"></span><span class="icon-name"> ti-shift-left</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-shift-right-alt"></span><span class="icon-name"> ti-shift-right-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shift-left-alt"></span><span class="icon-name"> ti-shift-left-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shield"></span><span class="icon-name"> ti-shield</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-notepad"></span><span class="icon-name"> ti-notepad</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-server"></span><span class="icon-name"> ti-server</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-pulse"></span><span class="icon-name"> ti-pulse</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-printer"></span><span class="icon-name"> ti-printer</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-power-off"></span><span class="icon-name"> ti-power-off</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-plug"></span><span class="icon-name"> ti-plug</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pie-chart"></span><span class="icon-name"> ti-pie-chart</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-panel"></span><span class="icon-name"> ti-panel</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-package"></span><span class="icon-name"> ti-package</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-music"></span><span class="icon-name"> ti-music</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-music-alt"></span><span class="icon-name"> ti-music-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-mouse"></span><span class="icon-name"> ti-mouse</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-mouse-alt"></span><span class="icon-name"> ti-mouse-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-money"></span><span class="icon-name"> ti-money</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-microphone"></span><span class="icon-name"> ti-microphone</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-menu"></span><span class="icon-name"> ti-menu</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-menu-alt"></span><span class="icon-name"> ti-menu-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-map"></span><span class="icon-name"> ti-map</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-map-alt"></span><span class="icon-name"> ti-map-alt</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-location-pin"></span><span class="icon-name"> ti-location-pin</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-light-bulb"></span><span class="icon-name"> ti-light-bulb</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-info"></span><span class="icon-name"> ti-info</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-infinite"></span><span class="icon-name"> ti-infinite</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-id-badge"></span><span class="icon-name"> ti-id-badge</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-hummer"></span><span class="icon-name"> ti-hummer</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-home"></span><span class="icon-name"> ti-home</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-help"></span><span class="icon-name"> ti-help</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-headphone"></span><span class="icon-name"> ti-headphone</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-harddrives"></span><span class="icon-name"> ti-harddrives</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-harddrive"></span><span class="icon-name"> ti-harddrive</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-gift"></span><span class="icon-name"> ti-gift</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-game"></span><span class="icon-name"> ti-game</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-filter"></span><span class="icon-name"> ti-filter</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-files"></span><span class="icon-name"> ti-files</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-file"></span><span class="icon-name"> ti-file</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-zip"></span><span class="icon-name"> ti-zip</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-folder"></span><span class="icon-name"> ti-folder</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-envelope"></span><span class="icon-name"> ti-envelope</span>
                        </div>


                        <div class="icon-container">
                            <span class="ti-dashboard"></span><span class="icon-name"> ti-dashboard</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-cloud"></span><span class="icon-name"> ti-cloud</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-cloud-up"></span><span class="icon-name"> ti-cloud-up</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-cloud-down"></span><span class="icon-name"> ti-cloud-down</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-clipboard"></span><span class="icon-name"> ti-clipboard</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-calendar"></span><span class="icon-name"> ti-calendar</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-book"></span><span class="icon-name"> ti-book</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bell"></span><span class="icon-name"> ti-bell</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-basketball"></span><span class="icon-name"> ti-basketball</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bar-chart"></span><span class="icon-name"> ti-bar-chart</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-bar-chart-alt"></span><span class="icon-name"> ti-bar-chart-alt</span>
                        </div>


                        <div class="icon-container">
                            <span class="ti-archive"></span><span class="icon-name"> ti-archive</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-anchor"></span><span class="icon-name"> ti-anchor</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-alert"></span><span class="icon-name"> ti-alert</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-alarm-clock"></span><span class="icon-name"> ti-alarm-clock</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-agenda"></span><span class="icon-name"> ti-agenda</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-write"></span><span class="icon-name"> ti-write</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-wallet"></span><span class="icon-name"> ti-wallet</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-video-clapper"></span><span class="icon-name"> ti-video-clapper</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-video-camera"></span><span class="icon-name"> ti-video-camera</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-vector"></span><span class="icon-name"> ti-vector</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-support"></span><span class="icon-name"> ti-support</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-stamp"></span><span class="icon-name"> ti-stamp</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-slice"></span><span class="icon-name"> ti-slice</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-shortcode"></span><span class="icon-name"> ti-shortcode</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-receipt"></span><span class="icon-name"> ti-receipt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pin2"></span><span class="icon-name"> ti-pin2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pin-alt"></span><span class="icon-name"> ti-pin-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pencil-alt2"></span><span class="icon-name"> ti-pencil-alt2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-eraser"></span><span class="icon-name"> ti-eraser</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-more"></span><span class="icon-name"> ti-more</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-more-alt"></span><span class="icon-name"> ti-more-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-microphone-alt"></span><span class="icon-name"> ti-microphone-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-magnet"></span><span class="icon-name"> ti-magnet</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-line-double"></span><span class="icon-name"> ti-line-double</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-line-dotted"></span><span class="icon-name"> ti-line-dotted</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-line-dashed"></span><span class="icon-name"> ti-line-dashed</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-ink-pen"></span><span class="icon-name"> ti-ink-pen</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-info-alt"></span><span class="icon-name"> ti-info-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-help-alt"></span><span class="icon-name"> ti-help-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-headphone-alt"></span><span class="icon-name"> ti-headphone-alt</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-gallery"></span><span class="icon-name"> ti-gallery</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-face-smile"></span><span class="icon-name"> ti-face-smile</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-face-sad"></span><span class="icon-name"> ti-face-sad</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-credit-card"></span><span class="icon-name"> ti-credit-card</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-comments-smiley"></span><span class="icon-name"> ti-comments-smiley</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-time"></span><span class="icon-name"> ti-time</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-share"></span><span class="icon-name"> ti-share</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-share-alt"></span><span class="icon-name"> ti-share-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-rocket"></span><span class="icon-name"> ti-rocket</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-new-window"></span><span class="icon-name"> ti-new-window</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-rss"></span><span class="icon-name"> ti-rss</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-rss-alt"></span><span class="icon-name"> ti-rss-alt</span>
                        </div>

                    </div><!-- Web App Icons -->


                    <div class="icon-section">
                        <h3>Control Icons</h3>
                        <div class="icon-container">
                            <span class="ti-control-stop"></span><span class="icon-name"> ti-control-stop</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-shuffle"></span><span class="icon-name"> ti-control-shuffle</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-play"></span><span class="icon-name"> ti-control-play</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-pause"></span><span class="icon-name"> ti-control-pause</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-forward"></span><span class="icon-name"> ti-control-forward</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-backward"></span><span class="icon-name"> ti-control-backward</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-volume"></span><span class="icon-name"> ti-volume</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-skip-forward"></span><span class="icon-name"> ti-control-skip-forward</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-skip-backward"></span><span class="icon-name"> ti-control-skip-backward</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-record"></span><span class="icon-name"> ti-control-record</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-control-eject"></span><span class="icon-name"> ti-control-eject</span>
                        </div>
                    </div> <!-- Control Icons -->


                    <div class="icon-section">
                        <h3>Text Editor</h3>

                        <div class="icon-container">
                            <span class="ti-paragraph"></span><span class="icon-name"> ti-paragraph</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-uppercase"></span><span class="icon-name"> ti-uppercase</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-underline"></span><span class="icon-name"> ti-underline</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-text"></span><span class="icon-name"> ti-text</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-Italic"></span><span class="icon-name"> ti-Italic</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-smallcap"></span><span class="icon-name"> ti-smallcap</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-list"></span><span class="icon-name"> ti-list</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-list-ol"></span><span class="icon-name"> ti-list-ol</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-align-right"></span><span class="icon-name"> ti-align-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-align-left"></span><span class="icon-name"> ti-align-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-align-justify"></span><span class="icon-name"> ti-align-justify</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-align-center"></span><span class="icon-name"> ti-align-center</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-quote-right"></span><span class="icon-name"> ti-quote-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-quote-left"></span><span class="icon-name"> ti-quote-left</span>
                        </div>

                    </div> <!-- Text Editor -->


                    <div class="icon-section">
                        <h3>Layout Icons</h3>
                        <div class="icon-container">
                            <span class="ti-layout-width-full"></span><span
                                    class="icon-name"> ti-layout-width-full</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-width-default"></span><span class="icon-name"> ti-layout-width-default</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-width-default-alt"></span><span class="icon-name"> ti-layout-width-default-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-tab"></span><span class="icon-name"> ti-layout-tab</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-tab-window"></span><span
                                    class="icon-name"> ti-layout-tab-window</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-tab-v"></span><span class="icon-name"> ti-layout-tab-v</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-tab-min"></span><span class="icon-name"> ti-layout-tab-min</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-slider"></span><span class="icon-name"> ti-layout-slider</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-slider-alt"></span><span
                                    class="icon-name"> ti-layout-slider-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-sidebar-right"></span><span class="icon-name"> ti-layout-sidebar-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-sidebar-none"></span><span
                                    class="icon-name"> ti-layout-sidebar-none</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-sidebar-left"></span><span
                                    class="icon-name"> ti-layout-sidebar-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-placeholder"></span><span
                                    class="icon-name"> ti-layout-placeholder</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-menu"></span><span class="icon-name"> ti-layout-menu</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-menu-v"></span><span class="icon-name"> ti-layout-menu-v</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-menu-separated"></span><span class="icon-name"> ti-layout-menu-separated</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-menu-full"></span><span class="icon-name"> ti-layout-menu-full</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-right"></span><span
                                    class="icon-name"> ti-layout-media-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-right-alt"></span><span class="icon-name"> ti-layout-media-right-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-overlay"></span><span class="icon-name"> ti-layout-media-overlay</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-overlay-alt"></span><span class="icon-name"> ti-layout-media-overlay-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-overlay-alt-2"></span><span class="icon-name"> ti-layout-media-overlay-alt-2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-left"></span><span
                                    class="icon-name"> ti-layout-media-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-left-alt"></span><span class="icon-name"> ti-layout-media-left-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-center"></span><span
                                    class="icon-name"> ti-layout-media-center</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-media-center-alt"></span><span class="icon-name"> ti-layout-media-center-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-list-thumb"></span><span
                                    class="icon-name"> ti-layout-list-thumb</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-list-thumb-alt"></span><span class="icon-name"> ti-layout-list-thumb-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-list-post"></span><span class="icon-name"> ti-layout-list-post</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-list-large-image"></span><span class="icon-name"> ti-layout-list-large-image</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-line-solid"></span><span
                                    class="icon-name"> ti-layout-line-solid</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid4"></span><span class="icon-name"> ti-layout-grid4</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid3"></span><span class="icon-name"> ti-layout-grid3</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid2"></span><span class="icon-name"> ti-layout-grid2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid2-thumb"></span><span
                                    class="icon-name"> ti-layout-grid2-thumb</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-cta-right"></span><span class="icon-name"> ti-layout-cta-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-cta-left"></span><span class="icon-name"> ti-layout-cta-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-cta-center"></span><span
                                    class="icon-name"> ti-layout-cta-center</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-cta-btn-right"></span><span class="icon-name"> ti-layout-cta-btn-right</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-cta-btn-left"></span><span
                                    class="icon-name"> ti-layout-cta-btn-left</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column4"></span><span class="icon-name"> ti-layout-column4</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column3"></span><span class="icon-name"> ti-layout-column3</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column2"></span><span class="icon-name"> ti-layout-column2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-accordion-separated"></span><span class="icon-name"> ti-layout-accordion-separated</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-accordion-merged"></span><span class="icon-name"> ti-layout-accordion-merged</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-accordion-list"></span><span class="icon-name"> ti-layout-accordion-list</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-widgetized"></span><span class="icon-name"> ti-widgetized</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-widget"></span><span class="icon-name"> ti-widget</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-widget-alt"></span><span class="icon-name"> ti-widget-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-view-list"></span><span class="icon-name"> ti-view-list</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-view-list-alt"></span><span class="icon-name"> ti-view-list-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-view-grid"></span><span class="icon-name"> ti-view-grid</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-upload"></span><span class="icon-name"> ti-upload</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-download"></span><span class="icon-name"> ti-download</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-loop"></span><span class="icon-name"> ti-loop</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-sidebar-2"></span><span class="icon-name"> ti-layout-sidebar-2</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid4-alt"></span><span class="icon-name"> ti-layout-grid4-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid3-alt"></span><span class="icon-name"> ti-layout-grid3-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-grid2-alt"></span><span class="icon-name"> ti-layout-grid2-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column4-alt"></span><span
                                    class="icon-name"> ti-layout-column4-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column3-alt"></span><span
                                    class="icon-name"> ti-layout-column3-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-layout-column2-alt"></span><span
                                    class="icon-name"> ti-layout-column2-alt</span>
                        </div>


                    </div> <!-- Layout Icons -->


                    <div class="icon-section">
                        <h3>Brand Icons</h3>

                        <div class="icon-container">
                            <span class="ti-flickr"></span><span class="icon-name"> ti-flickr</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-flickr-alt"></span><span class="icon-name"> ti-flickr-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-instagram"></span><span class="icon-name"> ti-instagram</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-google"></span><span class="icon-name"> ti-google</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-github"></span><span class="icon-name"> ti-github</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-facebook"></span><span class="icon-name"> ti-facebook</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-dropbox"></span><span class="icon-name"> ti-dropbox</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-dropbox-alt"></span><span class="icon-name"> ti-dropbox-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-dribbble"></span><span class="icon-name"> ti-dribbble</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-apple"></span><span class="icon-name"> ti-apple</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-android"></span><span class="icon-name"> ti-android</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-yahoo"></span><span class="icon-name"> ti-yahoo</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-trello"></span><span class="icon-name"> ti-trello</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-stack-overflow"></span><span class="icon-name"> ti-stack-overflow</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-soundcloud"></span><span class="icon-name"> ti-soundcloud</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-sharethis"></span><span class="icon-name"> ti-sharethis</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-sharethis-alt"></span><span class="icon-name"> ti-sharethis-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-reddit"></span><span class="icon-name"> ti-reddit</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-microsoft"></span><span class="icon-name"> ti-microsoft</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-microsoft-alt"></span><span class="icon-name"> ti-microsoft-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-linux"></span><span class="icon-name"> ti-linux</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-jsfiddle"></span><span class="icon-name"> ti-jsfiddle</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-joomla"></span><span class="icon-name"> ti-joomla</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-html5"></span><span class="icon-name"> ti-html5</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-css3"></span><span class="icon-name"> ti-css3</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-drupal"></span><span class="icon-name"> ti-drupal</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-wordpress"></span><span class="icon-name"> ti-wordpress</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-tumblr"></span><span class="icon-name"> ti-tumblr</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-tumblr-alt"></span><span class="icon-name"> ti-tumblr-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-skype"></span><span class="icon-name"> ti-skype</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-youtube"></span><span class="icon-name"> ti-youtube</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-vimeo"></span><span class="icon-name"> ti-vimeo</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-vimeo-alt"></span><span class="icon-name"> ti-vimeo-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-twitter"></span><span class="icon-name"> ti-twitter</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-twitter-alt"></span><span class="icon-name"> ti-twitter-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-linkedin"></span><span class="icon-name"> ti-linkedin</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-pinterest"></span><span class="icon-name"> ti-pinterest</span>
                        </div>

                        <div class="icon-container">
                            <span class="ti-pinterest-alt"></span><span class="icon-name"> ti-pinterest-alt</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-themify-logo"></span><span class="icon-name"> ti-themify-logo</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-themify-favicon"></span><span class="icon-name"> ti-themify-favicon</span>
                        </div>
                        <div class="icon-container">
                            <span class="ti-themify-favicon-alt"></span><span
                                    class="icon-name"> ti-themify-favicon-alt</span>
                        </div>

                    </div> <!-- brand Icons -->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot_js')
    <script>
        var to_obj="#{{ request()->input('to') }}";

        layui.use(['index'], function () {
            var $ = layui.$;
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            $(".site-doc-icon li").click(function(){
                console.log(to_obj);
                console.log($(to_obj).html());
                var icon_class=$(this).find(".doc-icon-fontclass").text();
                parent.$(to_obj).find('input').val('layui-icon '+icon_class);
                parent.$(to_obj).find(".icon-add").empty().append('<span class="layui-icon '+icon_class+'"></span>');
                parent.layer.close(index);
            });

            $(".icon-container").click(function(){
                console.log(to_obj);
                console.log($(to_obj).html());
                var icon_class=$(this).find(".icon-name").text();
                parent.$(to_obj).find('input').val(' '+icon_class);
                parent.$(to_obj).find(".icon-add").empty().append('<span class=" '+icon_class+'"></span>');
                parent.layer.close(index);
            });

        })
    </script>
@endsection