<div class="layui-form-item">
    <label class="layui-form-label">{{ $data['title']??'' }}
        @if($data['place'])
            <button class="layui-btn layui-btn-xs layui-btn-info" kq-event="upload_place" data-more="1"
                    data-obj="#{{ md5($data['name']) }}">文件库选择
            </button>
        @endif

    </label>
    <div class="layui-input-block">

        <div class="layui-uploads-pic layui-row layui-col-space10" id="{{ md5($data['name']) }}">
            @if($data['src'])
                @php
                    $thumbs=json_decode(urldecode($data['src']),1);

                @endphp
                @if(!empty($thumbs) )
                    @foreach( $thumbs as $k=>$v)
                        <div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 tupload-item upload-item-more "><img
                                    data-type="{{ $v['type'] }}"
                                    data-view_src="{{ $v['view_src'] }}"
                                    data-ext="{{ $v['ext'] }}"
                                    data-oss="local"
                                    data-tmpname="{{ $v['tmp'] }}"
                                    data-src="{{ $v['view_src'] }}"
                                    src="{{ $v['view_src'] }}"
                                    class="upload-item-pic" alt="">
                            <div class="item-foot-tools">
                                <button type="button" class="layui-btn layui-btn-xs layui-btn-green js_left_pic"><i
                                            class=" ti-arrow-left"></i></button>
                                <button type="button" class="layui-btn layui-btn-xs layui-btn-danger js_remove_pic">删除
                                </button>
                                <button type="button" class="layui-btn layui-btn-xs layui-btn-green js_right_pic"><i
                                            class=" ti-arrow-right"></i></button>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif

            <div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 upload-item-upload-obj">
                <a class="pic-add js-pic-upload-more" id="{{ $data['obj'] }}" href="javascript:void(0)" data-type="image"
                   data-screen_type=""
                   title="点击上传"></a>
                <input class="layui-upload-file" type="file" accept="undefined"
                       name="">
            </div>
            <input type="hidden" name="{{ $data['name'] }}" value="{{ $data['src']??'' }}" class="upload-item-field"
                   placeholder="{{ $data['title']??'' }}" lay-verify="{{ $data['rq']?'thumb':'' }}">


        </div>
    </div>
</div>

{{--<div class="layui-form-item">
            <label class="layui-form-label">多图上传
                <button class="layui-btn layui-btn-xs layui-btn-info" kq-event="upload_place" data-more="1" data-obj="aa">文件库选择</button>
            </label>
            <div class="layui-input-block">

                <div class="layui-uploads-pic layui-row layui-col-space10" id="aa">


                      <div class="item layui-col-xs6 layui-col-sm3 layui-col-md2 upload-item-upload-obj">
                        <a class="pic-add" id="uploadThmub2" href="javascript:void(0)" data-type="image"
                           data-screen_type=""
                           title="点击上传"></a>
                        <input class="layui-upload-file" type="file" accept="undefined"
                               name="file">
                    </div>
                    <input type="hidden" name="" value="" class="upload-item-field"
                           placeholder="" lay-verify="">

                </div>
            </div>
        </div>--}}