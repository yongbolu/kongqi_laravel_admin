@verbatim
    <script type="text/html" id="tpl-create-edit">
        {{# if(d.btns){ }}
        <p>
            {{#  layui.each(d.btns, function(index, item){ }}

            <a href="{{ item.url }}" target="{{ item.target || '_self' }}"
               class="layui-btn {{ item.class_name }} layui-btn-xs"><i
                        class="layui-icon {{ item.icon || '' }}"></i>{{ item.name }}</a>
            {{# if(index>3){  }}
            <br/>
            {{# } }}
            {{#  }); }}
        </p>
        {{#  }; }}
        {{# if(d.btn_open){ }}
        <p>
            {{#  layui.each(d.btn_open, function(index, item){ }}
            <a lay-event="open_layer" data-w="{{ item.w || '1200px' }}"
               data-h="{{ item.h || '800px' }}"
               data-title="{{ item.title || item.name }}" data-url="{{ item.url }}"
               class="layui-btn {{ item.class_name }} layui-btn-xs"><i
                        class="layui-icon {{ item.icon || '' }}"></i>{{ item.name }}</a>
            {{# if(index>3){  }}
            <br/>
            {{# } }}
            {{#  }); }}

        </p>
        {{#  }; }}
        {{# if(d.btn_posts){ }}
        <p>
            {{#  layui.each(d.btn_posts, function(index, item){ }}
            <a lay-event="open_post" data-w="{{ item.w || '1200px' }}"
               data-h="{{ item.h || '800px' }}"
               data-title="{{ item.title || item.name }}" data-post_url="{{ item.post_url }}"
               class="layui-btn {{ item.class_name }} layui-btn-xs"><i
                        class="layui-icon {{ item.icon || '' }}"></i>{{ item.name }}</a>
            {{# if(index>3){  }}
            <br/>
            {{# } }}
            {{#  }); }}

        </p>
        {{#  }; }}
        {{# if(!d.no_edit_btn){  }}
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                    class="layui-icon layui-icon-edit"></i>编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                    class="layui-icon layui-icon-delete"></i>删除</a>
        {{# } }}
    </script>
    <script type="text/html" id="tpl-del">
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                    class="layui-icon layui-icon-delete"></i>删除</a>
    </script>
    <script type="text/html" id="tpl-create-no-edit">
        {{# if(d.btns){ }}
        <p>
            {{#  layui.each(d.btns, function(index, item){ }}

            <a href="{{ item.url }}" class="layui-btn {{ item.class_name }} layui-btn-xs"><i
                        class="layui-icon {{ item.icon || '' }}"></i>{{ item.name }}</a>
            {{#  }); }}
            {{# if(index>3){  }}
            <br/>
            {{# } }}
        </p>
        {{#  }; }}
        {{# if(d.btn_open){ }}
        <p>
            {{#  layui.each(d.btn_open, function(index, item){ }}
            <a lay-event="open_layer" data-w="{{ item.w || '1200px' }}"
               data-h="{{ item.h || '800px' }}"
               data-title="{{ item.title || item.name }}" data-url="{{ item.url }}"
               class="layui-btn {{ item.class_name }} layui-btn-xs"><i
                        class="layui-icon {{ item.icon || '' }}"></i>{{ item.name }}</a>
            {{#  }); }}
            {{# if(index>3){  }}
            <br/>
            {{# } }}
        </p>
        {{#  }; }}


    </script>
    <script type="text/html" id="tpl-user-thumb">
        {{# if(d.thumb){ }}
        <img lay-event="show_img" style="" src= {{ d.thumb}}>
        {{#  }; }}
    </script>
    <script type="text/html" id="tpl-icon">
        <span class="{{ d.icon }}"></span>
    </script>

    <script>
        function layui_btn_tpl(title,event,classname){
            return ' <a class="layui-btn  layui-btn-xs '+classname+'" lay-event="'+event+'"><i class="layui-icon layui-icon-delete"></i>'+title+'</a>';
        }
        //回调函数
        function layui_switch(field, d, text, value, true_value, false_value) {
            value = value || 1;
            text = text || '是|否';
            true_value = true_value || 1;
            false_value = false_value || 0;
            return '<input type="checkbox" data-true="' + true_value + '" data-false_value="' + false_value + '"  lay-skin="switch" lay-text="' + text + '" lay-filter="table-checked" ' +
                'value="' + d[field] + '" data-id="' + d.id + '"  data-field="' + field + '" ' + (d[field] == value ? 'checked' : '') + '>';
        }

        function layui_pic(img) {
            if (img) {
                return ' <img lay-event="show_img" style="height:70px;" src="' + img + '">';
            }
        }

        //回调函数设置label
        function layui_label(value, class_style) {
            var class_name = 'label-' + class_style;
            return '<span class="label  ' + class_name + '">' + value + '</span>';
        }

        //回调标题设置查看
        function layui_title_show(title, url, type, w, h) {
            switch (type) {
                case 'open_layer':
                    return '<a lay-tips="点击查看详情" href="javascript:void(0)" class="text-primary" data-w="' + (w || '80%') + '" data-h="' + (h || '80%') + '" data-url="' + url + '" ' +
                        'data-title="' + (title) + '" lay-event="open_layer">' + (title) + '</a>';
                    break;
                case 'link':
                    return '<a class="text-primary" href="' + url + '" >' + (title) + '</a>';
                    break;
            }


        }

        function layui_btn_show(title, url, type, classname, w, h) {
            switch (type) {
                case 'open_layer':
                    return '<a lay-tips="点击查看详情" href="javascript:void(0)" class="layui-btn layui-btn-xs ' + (classname || 'layui-btn-normal') + '" data-w="' + (w || '80%') + '" data-h="' + (h || '80%') + '" data-url="' + url + '" ' +
                        'data-title="' + (title) + '" lay-event="open_layer">' + (title) + '</a>';
                    break;
                case 'link':
                    return '<a class="layui-btn layui-btn-xs ' + (classname || 'layui-btn-normal') + '" href="' + url + '" >' + (title) + '</a>';
                    break;
            }


        }

        function layui_open_post(title, url, post, tips, w, h) {
            w = w || '100%';
            h = h || '100%';
            tips = tips || '操作';
            return '<a href="javascript:void(0)" data-title="' + tips + '" lay-event="open_layer_post" class="layui-btn layui-btn-normal layui-btn-xs" data-post_url="' + post + '" data-url="' + url + '" data-w="' + w + '" data-h="' + h + '">' + title + '</a>'
        }

    </script>
@endverbatim