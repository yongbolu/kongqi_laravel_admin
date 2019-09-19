<div class="layui-form-item">
   @include('plugin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        @if(!empty($data['list']))
            @foreach ($data['list']['data'] as $v)
                <input  lay-verify="{{ $data['rq']?$data['rq']:'radio' }}"
                        data-title="{{ $data['title'] }}"
                        type="radio"
                        name="{{ $data['name'] }}"
                        value="{{ $v['id'] }}"
                        title="{{ $v['name'] }}"
                        lay-filter="{{ $data['filter']??'' }}"
                        {{ $data['on_id']==$v['id']?'checked':'' }}>


            @endforeach
        @endif

    </div>
</div>