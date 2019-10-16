<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\FileGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExtendClass\UploadFile;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends BaseController
{
    //
    public function handle($type, Request $request)
    {
        if ($type == 'upload') {
            return $this->upload($request);
        }
        if ($type == 'list') {
            return $this->getList($request);
        }
        if ($type == 'files') {
            //图片空间
            $this->setModelControllerView('fileupload');
            return $this->getList($request);
        }
        if ($type == 'api') {
            return $this->getApi($request);
        }
        if ($type == 'addGroup') {
            return $this->addGroup($request);
        }
        if ($type == 'getGroup') {
            return $this->getGroup($request);
        }
    }

    public function getGroup()
    {
        $list = FileGroup::get()->toArray();
        return $this->returnOkApi('请求成功', $list);
    }

    /**
     * 添加分组
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function addGroup(Request $request)
    {
        $name = $request->input('name');

        $error = $this->checkForm($request->all(), ['name' => 'required|unique:file_groups,name']);

        if (count($error) > 0) {
            return $this->checkFormErrorFormat($error);
        };
        $data = [
            'name' => $name,
            'model_id' => admin('id'),
            'model_type' => 'admin'
        ];

        $r = FileGroup::create($data);
        if ($r) {
            return $this->returnOkApi('添加成功', $r->id);
        }
        return $this->returnErrorApi('添加失败');
    }

    protected function upload($request)
    {
        $files = $request->input('files', 'file');
        $screen = $request->input('screen', '');
        $type = $request->input('uptype', 'image');
        $group_id = $request->input('group_id', '0');
        $method = $request->input('method', 'upload');
        $r = UploadFile::upload($files, $type, $method, $screen, $group_id);
        return response()->json($r);
    }

    protected function getList($request)
    {
        return $this->display([]);
    }

    protected function getApi($request)
    {
        $type = $request->input('uptype', '');
        $screen = $request->input('screen', '');
        $is_oss = $request->input('is_oss', false);
        $offset = $request->input('offset', 1);
        $pagesize = $request->input('limit', 1);
        $offset = ($offset - 1) * $pagesize;
        $key = $request->input('search', '');

        $model = new File();
        if ($type) {
            if ($type == 'file') {
                $model = $model->whereIn('type', ['file', 'zip', 'excel']);
            } else {
                $model = $model->where('type', $type);
            }

        }

        if ($screen) {
            $model = $model->where('screen', $screen);
        }
        $total = $model->where('user_type', 'admin')->count();

        $data = $model->where('user_type', 'admin')->skip($offset)->take($pagesize)->orderBy('id', 'desc')->get()->toArray();
        $str = '';
        $uindex = 0;
        foreach ($data as $key => $v) {
            $pic_url = $v['path'];
            $is_oss = $is_oss ? $is_oss : config('website.is_oss');
            $v['oss'] = '';
            if ($is_oss) {
                if (Storage::exists($pic_url)) {
                    $pic_url = Storage::url($v['path']);
                    $v['oss'] = Storage::url($v['path']);
                }

            }
            $img_pic = picurl($v['path']);
            if (in_array($v['ext'], ['.xlsx', '.xls'])) {
                $img_pic = 'excel.jpg';
                $img_pic = ___('/admin/images/' . $img_pic);
            }
            if (in_array($v['ext'], ['.doc', '.docx'])) {
                $img_pic = 'word.jpg';
                $img_pic = ___('/admin/images/' . $img_pic);
            }
            if (in_array($v['ext'], ['zip', ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2"])) {
                $img_pic = 'zip.jpg';
                $img_pic = ___('/admin/images/' . $img_pic);
            }
            if (in_array($v['ext'], ['zip', ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2"])) {
                $img_pic = 'zip.jpg';
                $img_pic = ___('/admin/images/' . $img_pic);
            }
            if (in_array($v['ext'], [
                ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg", ".wmv",
                ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid", ".cab", ".iso",
                ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml", ".psd", ".ai", ".cdr"
            ])) {
                $img_pic = 'file.jpg';
                $img_pic = ___('/admin/images/' . $img_pic);
            }

            $img_html = ' <img data-path="' . $pic_url . '" data-view_src="' . $img_pic . '"  data-tmpname="' . $v['tmp'] . '" data-oss="' . $v['oss_type'] . '" data-ext="' . $v['ext'] . '"  data-type="' . $v['type'] . '" src="' . $img_pic . '" class="upload-item-pic" title="' . $v['tmp'] . '" alt="" > ';
            if ($v['type'] == 'vedio') {
                $img_html = ' <video  class="upload_img" src="' . $v['path'] . '" data-type="' . $v['type'] . '" data-src="' . $v['path'] . '" controls="controls"  style="width: 100%;"></video>';
            }

            $str .= ' 
                    <div class="item layui-col-xs4 layui-col-sm3 layui-col-md2 tupload-item upload-item-more "> 
                   ' . $img_html . '
                    <div class="item-foot-tools"> <p>' . $v['tmp'] . '</p> 
                    </div> </div>';
            $uindex++;
        }

        $list = [
            'total' => $total,
            'contents' => $str,
            'pagesize' => $pagesize
        ];
        $debug = $request->input('debug', 0);
        if ($debug) {
            return $this->jsonDebug($list);
        }
        return response()->json($list);
    }
}
