@extends('admin.layout.baseDoing')
@section('add_css')

@endsection
@section('content')
    <div class="m-10">
        <div class="layui-breadcrumb" lay-separator="|">
            <span class="m-r-10">分类:</span>
            <a href="">默认</a>

        </div>
        <div class="m-t-10" style="">
            <div class=" tuku-list layui-uploads-pic layui-row layui-col-space10">


            </div>
            <div class="" id="page"></div>

        </div>
    </div>
@endsection
@section('foot_js')
    <script>
        var is_more="{{ request()->input('is_more',0) }}"
        layui.use(['index', 'listTable'], function () {
            var listTable = layui.listTable;
            var $=layui.$;
            listTable.diy_list(".tuku-list", "{!!  admin_url('FileUpload','handle',['type'=>'api','uptype'=>request()->input('type'),'screen'=>request()->input('screen')])  !!}", {'limit': 20});
            $(document).on('click',".upload-item-more",function(){

                if(is_more==1)
                {
                    $(this).toggleClass('on');
                }else
                {

                    $(".upload-item-more").removeClass('on');
                    $(this).addClass('on');
                }
            })
        })
    </script>
@endsection