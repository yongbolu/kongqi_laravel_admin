
<div class="layui-form-item" >
   @include('admin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <textarea id="{{ $data['id']??$data['name'] }}"  name="{{ $data['name'] }}"
                   placeholder="{{ isset($data['tips'])?$data['tips']:$data['title'] }}"
                   lay-verify="{{ $data['rq']?$data['rq']:'' }}" autocomplete="off" class="layui-textarea">{{ $data['value']??'' }}</textarea>
    </div>
</div>