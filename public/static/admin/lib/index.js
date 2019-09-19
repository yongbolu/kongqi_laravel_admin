/**

 @Name：layuiAdmin iframe版主入口
 @Author：贤心
 @Site：http://www.layui.com/admin/
 @License：LPPL

 */

layui.extend({
    setter: 'config' //配置模块
    , admin: 'lib/admin', //核心模块
    md5: 'lib/md5', //核心模块
    cacheNav: 'lib/cacheNav' //核心模块
    , view: 'lib/view' //视图渲染模块
}).define(['setter', 'admin'], function (exports) {
    var setter = layui.setter
        , element = layui.element
        , admin = layui.admin
        , md5 = layui.md5
        , cacheNav = layui.cacheNav
        , tabsPage = admin.tabsPage
        , view = layui.view

        //打开标签页
        , openTabsPage = function (url, text) {
            //遍历页签选项卡
            var matchTo
                , tabs = $('#LAY_app_tabsheader>li')
                , path = url.replace(/(^http(s*):)|(\?[\s\S]*$)/g, '');


            tabs.each(function (index) {
                var li = $(this)
                    , layid = li.attr('lay-id');
                //console.log('index:',index);
                if (layid === url) {
                    matchTo = true;
                    tabsPage.index = index;
                }
            });

            text = text || '新标签页';

            if (setter.pageTabs) {
                //如果未在选项卡中匹配到，则追加选项卡
                if (!matchTo) {
                    $(APP_BODY).append([
                        '<div class="layadmin-tabsbody-item layui-show">'
                        , '<iframe src="' + url + '" frameborder="0" class="layadmin-iframe"></iframe>'
                        , '</div>'
                    ].join(''));
                    tabsPage.index = tabs.length;
                    element.tabAdd(FILTER_TAB_TBAS, {
                        title: '<span>' + text + '</span>'
                        , id: url
                        , attr: path
                    });
                }
            } else {
                var iframe = admin.tabsBody(admin.tabsPage.index).find('.layadmin-iframe');
                iframe[0].contentWindow.location.href = url;
            }

            //定位当前tabs
            element.tabChange(FILTER_TAB_TBAS, url);
            admin.tabsBodyChange(tabsPage.index, {
                url: url
                , text: text
            });
        }

        , APP_BODY = '#LAY_app_body', FILTER_TAB_TBAS = 'layadmin-layout-tabs'
        , $ = layui.$, $win = $(window);

    //初始
    if (admin.screen() < 2) admin.sideFlexible();

    //加载上次
    var cacheOpenTabsPage = function () {

        //判断是否存在缓存
        var cache_navs = cacheNav.get();

        if (cache_navs) {

            var item_key = cacheNav.getOn();
            //进行输出变量
            var top_tab_str = '';
            for (var i in cache_navs) {
                var item = cache_navs[i];

                if (item && item.href) {

                    //插入顶部tabs
                    openTabsPage(item.href, item.title)
                    cacheNav.setOn(item_key);
                }

            }
            //设置最后一个定位
            item_key = cacheNav.getOn();
            var item = cache_navs[item_key];
            if (item && item.href) {
                openTabsPage(item.href, item.title)
            }

        }
    };
    cacheOpenTabsPage();


    //将模块根路径设置为 controller 目录
    layui.config({
        base: setter.base + 'modules/'
    });

    //扩展 lib 目录下的其它模块
    layui.each(setter.extend, function (index, item) {
        var mods = {};
        mods[item] = '{/}' + setter.base + 'lib/extend/' + item;
        layui.extend(mods);
    });


    view().autoRender();

    //加载公共模块
    layui.use('common');

    //对外输出
    exports('index', {
        openTabsPage: openTabsPage

    });
});
