<div class="layui-form-item">
   @include('admin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <input type="text" id="{{ $data['id']??$data['name'] }}"
               name="{{ $data['name'] }}"
               value="{{ $data['value']??'' }}"
               placeholder="{{ isset($data['tips'])?$data['tips']:$data['title'] }}"
               lay-verify="{{ $data['rq']?$data['rq']:'' }}"
               kq-event="date" data-obj="{{ $data['name'] }}"
               data-min="{{ $data['min']??"" }}"
               data-max="{{ $data['max']??"" }}"
               data-config="{{ $data['config']??"{}" }}"
               data-format="{{ $data['format']??'yyyy-MM-dd HH:mm:ss' }}" autocomplete="off" class="layui-input"/>
    </div>
</div>
