<div class="layui-form-item">
   @include('plugin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <input type="{{ $data['type']??'text' }}" name="{{ $data['name'] }}" value="{{ $data['value']??'' }}"
               placeholder="{{ isset($data['tips'])?$data['tips']:$data['title'] }}"
               lay-verify="{{ $data['rq']?$data['rq']:'' }}" id="{{ $data['id']??$data['name'] }}"
               autocomplete="off" class="layui-input"/>
    </div>
</div>
