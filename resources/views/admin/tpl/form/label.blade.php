@php
$is_must=$data['must']??0;
$is_must=$is_must?$is_must:$data['rq']??"0";
@endphp
<label class="layui-form-label">
    @if($is_must)<strong class="item-required">*</strong>
    @endif{{ $data['title']??'' }}{!! isset($data['mark'])?$data['mark']?'<span style="font-size:12px">('.$data['mark'].')</span>':'':''  !!}
</label>