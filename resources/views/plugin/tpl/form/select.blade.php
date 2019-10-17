<div class="layui-form-item">
    @include('plugin.tpl.form.label',['data'=>$data])
    <div class="layui-input-block">
        <select name="{{ $data['name'] }}"
                lay-filter="{{ $data['filter']??'' }}"
                id="{{ $data['name'] }}"
                lay-verify="{{ $data['rq']?$data['rq']:'' }}"
                {{ $data['search']??"lay-search" }}>
            <option value="">直接选择或搜索选择</option>
            @if(!empty($data['list']))
                @if(isset($data['list']['type']) && $data['list']['type']=='key_value')
                    @foreach ($data['list']['data'] as $k=>$v)
                        <option {{ $data['on_id']==$k?'selected':'' }} value="{{ $k }}">{{ $v }}</option>

                    @endforeach
                @else
                    @foreach ($data['list']['data'] as $v)
                        <option {{ $data['on_id']==$v['id']?'selected':'' }} value="{{ $v['id'] }}">{{ $v['name'] }}</option>

                    @endforeach
                @endif

            @endif
        </select>
    </div>
</div>
