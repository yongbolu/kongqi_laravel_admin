<div class="layui-form-item">
   @include('admin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <select name="{{ $data['name'] }}"
                lay-filter="{{ $data['filter']??'' }}"
                id="{{ $data['name'] }}"
                lay-verify="{{ $data['rq']?$data['rq']:'' }}"
                {{ $data['search']??"lay-search" }}>
            <option value="">直接选择或搜索选择</option>
            @if(!empty($data['list']))
                @foreach ($data['list']['data'] as $v)
                    <option {{ $data['on_id']==$v['id']?'selected':'' }} value="{{ $v['id'] }}">{{ $v['name'] }}</option>

                @endforeach
            @endif
        </select>
    </div>
</div>
