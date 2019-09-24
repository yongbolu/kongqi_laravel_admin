<div class="layui-form-item">
   @include('admin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <div class="layui-inline" style="">
        <input kq-event="color" data-color_obj="#{{ $data['c_id']??$data['name'].'_color' }}" type="{{ $data['type']??'text' }}" name="{{ $data['name'] }}" value="{{ $data['value']??'' }}"
               placeholder="{{ isset($data['tips'])?$data['tips']:$data['title'] }}"
               lay-verify="{{ $data['rq']?$data['rq']:'' }}" id="{{ $data['id']??$data['name'] }}"
               autocomplete="off" class="layui-input"/>
        </div>
        <div class="layui-inline" style="left: -15px;margin: 0">
            <div id="{{ $data['c_id']??$data['name'].'_color' }}"></div>
        </div>
    </div>
</div>
