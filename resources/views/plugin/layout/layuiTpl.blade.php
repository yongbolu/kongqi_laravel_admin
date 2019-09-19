@verbatim
    <script type="text/html" id="tpl-create-edit">
        {{# if(d.btns){ }}
        <p>
            {{#  layui.each(d.btns, function(index, item){ }}

            <a href="{{ item.url }}" target="{{ item.target || '_self' }}" class="layui-btn {{ item.class_name }} layui-btn-xs"><i
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
        //回调函数
        function layui_switch(field, d, text, value, true_value, false_value) {
            value = value || 1;
            text = text || '是|否';
            true_value = true_value || 1;
            false_value = false_value || 2;
            return '<input type="checkbox" data-true="' + true_value + '" data-false_value="' + false_value + '"  lay-skin="switch" lay-text="' + text + '" lay-filter="table-checked" ' +
                'value="' + d[field] + '" data-id="' + d.id + '"  data-field="' + field + '" ' + (d[field] == value ? 'checked' : '') + '>';
        }

        //回调函数设置label
        function layui_label(value, class_style) {
            var class_name = 'label-' + class_style;
            return '<span class="label  ' + class_name + '">' + value + '</span>';
        }

    </script>
@endverbatim