@extends('admin.layout.baseDoing')
@section('add_css')
    <style>
        .upload-category {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    @php
    $open_file=request()->input('open_file',0);
    @endphp
    <div class="m-10">
        <div class="layui-row layui-col-space10">

            <div class="layui-col-xs12">
                <div class="layui-tab layui-tab-brief">
                    <ul class="layui-tab-title">
                        <li class="{{$open_file?'':'layui-this'}}">上传</li>
                        <li class="{{$open_file?'layui-this':''}}">文件库</li>

                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item {{$open_file?'':'layui-show'}} upload-tuku-area">
                            <div class="layui-uploads-pic ">
                                <div class=" ">
                                    <a class="pic-add" id="upload-area" href="javascript:void(0)" data-type="image"
                                       data-screen_type=""
                                       title="点击上传"></a>

                                </div>
                            </div>
                            <div class="upload-category">
                                <form class="layui-form" action="">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label text-left">存入所属组</label>
                                        <div class="layui-input-inline">
                                            <select lay-filter="listGroup" id="listGroup">


                                            </select>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux"><a href="javascript:void(0)"
                                                                                      class="text-primary js-add">添加</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="upload-categor-form layui-hide">
                                    <form class="layui-form" action="">
                                        <label class="layui-form-label text-left">名称</label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="name" required lay-verify="required"
                                                   placeholder="请输入名称" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-input-inline">
                                            <button class="layui-btn" lay-submit lay-filter="addGroup">添加</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class=" upload-tuku-list  layui-uploads-pic layui-row layui-col-space10">


                            </div>
                        </div>
                        <div class="layui-tab-item {{$open_file?'layui-show':''}}">
                            <div class=" tuku-list layui-uploads-pic layui-row layui-col-space10">


                            </div>
                            <div class="" id="page"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
@section('foot_js')
    <script>
        var is_more = "{{ request()->input('is_more',0) }}"
        layui.use(['index', 'listTable', 'request', 'layer','uploader'], function () {

            var listTable = layui.listTable;
            var req = layui.request;
            var $ = layui.$;
            var layer = layui.layer;
            var form = layui.form;
            listTable.diy_list(".tuku-list", "{!!  admin_url('FileUpload','handle',['type'=>'api','uptype'=>request()->input('type'),'screen'=>request()->input('screen')])  !!}", {'limit': 20});
            $(document).on('click', ".upload-item-more", function () {

                if (is_more == 1) {
                    $(this).toggleClass('on');
                } else {

                    $(".upload-item-more").removeClass('on');
                    $(this).addClass('on');
                }
            })

            var uploader = layui.uploader;
            var uploadObj;

            uploadObj=uploader.list_upload("#upload-area");

            //添加分组
            form.on('submit(addGroup)', function (data) {

                req.post('{{ route('admin.upload',['type'=>'addGroup']) }}', data.field, function (res) {
                    layui.layer.msg(res.msg);
                    if (res.code == 200) {
                        getGroup(res.data);
                        //修改分组
                        uploadObj.config.data.group_id=res.data;
                        $("#upload-area").attr('group_id',res.data);
                        $(".upload-categor-form").toggleClass('layui-hide');
                    } else {

                    }
                })
                return false;

            });

            form.on('select(listGroup)', function(data){

                $("#upload-area").attr('group_id',data.value);
               //修改分组
                uploadObj.config.data.group_id=data.value;

            });
            getGroup();

            /**
             * 取得分组
             * @param id
             */
            function getGroup(id) {
                //请求分组
                req.post('{{ route('admin.upload',['type'=>'getGroup']) }}', {}, function (res) {

                    var html_str = '<option value="0">默认</option>';
                    var select_str = '';
                    if (res.data.length > 0) {

                        for (var i in res.data) {
                            if (res.data[i]['id'] == id) {
                                select_str = 'selected';
                            } else {
                                select_str = '';
                            }
                            html_str += '<option value="' + res.data[i]['id'] + '" ' + select_str + '>' + res.data[i]['name'] + '</option>';
                        }
                    }
                    $("#listGroup").empty().append(html_str);
                    form.render('select'); //刷新select选择框渲染
                })
            }

            $(".js-add").click(function () {
                $(".upload-categor-form").toggleClass('layui-hide');
            })





        })
    </script>
@endsection