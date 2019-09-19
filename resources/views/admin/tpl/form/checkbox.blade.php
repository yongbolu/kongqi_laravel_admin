<div class="layui-form-item">
   @include('admin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        @if(!empty($data['list']))
            @foreach ($data['list']['data'] as $v)

                <input {{ is_array($data['on_id'])?in_array($v['id'],$data['on_id'])?"checked":"":$data['on_id']==$v['id']?'checked':'' }}
                       type="checkbox" name="{{ $data['name'] }}[]"
                       data-min="{{ $data['min']??1 }}"
                       lay-filter="{{ $data['filter']??'' }}"
                       value="{{ $v['id'] }}"
                       lay-skin="{{ $data['style']??'primary' }}" title="{{ $v['name'] }}">
            @endforeach
        @endif

    </div>
</div>