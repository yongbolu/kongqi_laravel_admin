<div class="layui-form-item">
   @include('plugin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block" id="{{ md5($data['name']) }}">
        <input  type="hidden" name="{{ $data['name'] }}" value="{{ $data['value']??'' }}"
               placeholder="{{ isset($data['tips'])?$data['tips']:$data['title'] }}"
               lay-verify="{{ $data['rq']?$data['rq']:'' }}" autocomplete="off" class="layui-input"/>
        <div class="icon-add" style="display: inline-block;padding: 9px 0!important">
            <span class="{{ $data['value']??'' }}"></span>
        </div>
        <button class="layui-btn layui-btn-xs layui-btn-info" kq-event="icon" data-more="0" data-obj="{{ md5($data['name']) }}">文件库选择</button>
    </div>
</div>
