<?php

namespace App\ExtendClass;

use Intervention\Image\Facades\Image;

/**
 * Created by phpstorm.
 * User: kongqi
 * Date: 2017/4/6
 * Time: 18:25
 */
class AnyUpload
{
    private $fileField; //文件域名
    private $file; //文件上传对象
    private $base64; //文件上传对象
    private $config; //配置信息
    private $oriName; //原始文件名
    private $fileName; //新文件名
    private $fullName; //完整文件名,即从当前配置目录开始的URL
    private $filePath; //完整文件名,即从当前配置目录开始的URL
    private $fileSize; //文件大小
    private $fileType; //文件类型
    private $height = 0;
    private $width = 0;
    private $stateInfo; //上传状态信息,
    private $stateMap = [ //上传状态映射表，国际化用户需考虑此处数据的国际化
        "SUCCESS", //上传成功标记，在UEditor中内不可改变，否则flash判断会出错
        "文件大小超出 upload_max_filesize 限制",
        "文件大小超出 MAX_FILE_SIZE 限制",
        "文件未被完整上传",
        "没有文件被上传",
        "上传文件为空",
        "ERROR_TMP_FILE" => "临时文件错误",
        "ERROR_TMP_FILE_NOT_FOUND" => "找不到临时文件",
        "ERROR_SIZE_EXCEED" => "文件大小超出网站限制",
        "ERROR_TYPE_NOT_ALLOWED" => "文件类型不允许上传",
        "ERROR_CREATE_DIR" => "目录创建失败",
        "ERROR_DIR_NOT_WRITEABLE" => "目录没有写权限",
        "ERROR_FILE_MOVE" => "文件保存时出错",
        "ERROR_FILE_NOT_FOUND" => "找不到上传文件",
        "ERROR_WRITE_CONTENT" => "写入文件内容错误",
        "ERROR_UNKNOWN" => "未知错误",
        "ERROR_DEAD_LINK" => "链接不可用",
        "ERROR_HTTP_LINK" => "链接不是http链接",
        "ERROR_HTTP_CONTENTTYPE" => "链接contentType不正确",
        "INVALID_URL" => "非法 URL",
        "INVALID_IP" => "非法 IP"
    ];

    /**
     * 构造函数
     */
    public function __construct()
    {

        //$this->stateMap['ERROR_TYPE_NOT_ALLOWED'] = iconv('unicode', 'utf-8', $this->stateMap['ERROR_TYPE_NOT_ALLOWED']);
    }

    /**
     * @param string $fileField 表单名称
     * @param array $config 配置项
     * @param bool $base64 是否解析base64编码，可省略。若开启，则$fileField代表的是base64编码的字符串表单名
     */
    public function config($fileField = 'file', $config, $type = "upload")
    {

        $this->fileField = $fileField;
        $this->config = $config;//获得配置信息
        $this->type = $type;//上传类型
        if ($type == "remote") {
            $this->saveRemote();
        }
        if ($type == "avatar") {
            $this->saveAvatar();
        } else if ($type == "base64") {
            $this->upBase64();
        } else {
            $this->upFile();
        }

    }

    //压缩图片
    public function createThumb($info)
    {
        $file = $this->filePath;
        $quality = 100;
        $img = Image::make($file);
        //如果存在则设置固定大小

        if (isset($info['w']) && isset($info['h'])) {
            $img->resize($info['w'], $info['h']);
        } elseif (isset($info['w'])) {
            //判断是否>
            if ($img->width() < $info['w']) {
                return false;
            }
            $img->widen($info['w']);
        } elseif (isset($info['h'])) {
            //判断是否>
            if ($img->height() < $info['h']) {
                return false;
            }
            $img->heighten(isset($info['h']));

        }
        $img->save($file, $quality);
        sleep(1);
        return $img->response('', $quality);
    }

    /**
     * 上传文件的主处理方法
     * @return mixed
     */
    private function upFile()
    {
        $file = $this->file = $_FILES[$this->fileField];
        if (!$file) {
            $this->stateInfo = $this->getStateInfo("ERROR_FILE_NOT_FOUND");
            return;
        }
        if ($this->file['error']) {
            $this->stateInfo = $this->getStateInfo($file['error']);
            return;
        } else if (!file_exists($file['tmp_name'])) {
            $this->stateInfo = $this->getStateInfo("ERROR_TMP_FILE_NOT_FOUND");
            return;
        } else if (!is_uploaded_file($file['tmp_name'])) {
            $this->stateInfo = $this->getStateInfo("ERROR_TMPFILE");
            return;
        }

        $this->oriName = $file['name'];
        $this->fileSize = $file['size'];

        //检查是否不允许的文件格式

        if (!$this->checkType()) {
            $this->stateInfo = $this->getStateInfo("ERROR_TYPE_NOT_ALLOWED");
            return;
        }

        $this->fileType = $this->getFileExt();//获得文件类型
        $this->fullName = $this->getFullName();//获得新的文件名
        $this->filePath = $this->getFilePath();
        $this->fileName = $this->getFileName();
        $dirname = dirname($this->filePath);

        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return;
        }

        //创建目录失败
        if (!file_exists($dirname) && !mkdir($dirname, 0777, true)) {
            $this->stateInfo = $this->getStateInfo("ERROR_CREATE_DIR");

            return;
        } else if (!is_writeable($dirname)) {
            $this->stateInfo = $this->getStateInfo("ERROR_DIR_NOT_WRITEABLE");
            return;
        }

        //移动文件
        if (!(move_uploaded_file($file["tmp_name"], $this->filePath) && file_exists($this->filePath))) { //移动失败
            $this->stateInfo = $this->getStateInfo("ERROR_FILE_MOVE");
        } else {
            //如果存在要压缩比例
            if (isset($this->config['thumbs'])) {
                $this->createThumbs($this->config['thumbs']);
            }
            $this->stateInfo = $this->stateMap[0];
        }
    }


    /**
     * 处理base64编码的图片上传
     * @return mixed
     */
    private function upBase64()
    {
        $base64Data = trim($this->fileField);//$_POST[$this->fileField];
        $type = "base64.jpg";
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64Data, $result)) {
            $img = base64_decode(str_replace($result[1], '', $base64Data));
            $type = "base64." . $result[2];
        }
        //$img = base64_decode($base64Data);
        //echo $img ;
        $this->oriName = $type;
        $this->fileSize = strlen($img);
        $this->fileType = $this->getFileExt();
        $this->fullName = $this->getFullName();
        $this->filePath = $this->getFilePath();
        $this->fileName = $this->getFileName();
        $dirname = dirname($this->filePath);

        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return;
        }

        //创建目录失败
        if (!file_exists($dirname) && !mkdir($dirname, 0777, true)) {
            $this->stateInfo = $this->getStateInfo("ERROR_CREATE_DIR");
            return;
        } else if (!is_writeable($dirname)) {
            $this->stateInfo = $this->getStateInfo("ERROR_DIR_NOT_WRITEABLE");
            return;
        };
        //移动文件
        if (!(file_put_contents($this->filePath, $img) && file_exists($this->filePath))) { //移动失败
            $this->stateInfo = $this->getStateInfo("ERROR_WRITE_CONTENT");
        } else { //移动成功
            $this->stateInfo = $this->stateMap[0];
        }

    }

    /**
     * 拉取远程图片
     * @return mixed
     */
    private function saveRemote()
    {
        $imgUrl = htmlspecialchars($this->fileField);
        $imgUrl = str_replace("&amp;", "&", $imgUrl);

        //http开头验证
        if (strpos($imgUrl, "http") !== 0) {
            $this->stateInfo = $this->getStateInfo("ERROR_HTTP_LINK");
            return;
        }

        preg_match('/(^https*:\/\/[^:\/]+)/', $imgUrl, $matches);
        $host_with_protocol = count($matches) > 1 ? $matches[1] : '';

        // 判断是否是合法 url
        if (!filter_var($host_with_protocol, FILTER_VALIDATE_URL)) {
            $this->stateInfo = $this->getStateInfo("INVALID_URL");
            return;
        }

        preg_match('/^https*:\/\/(.+)/', $host_with_protocol, $matches);
        $host_without_protocol = count($matches) > 1 ? $matches[1] : '';

        // 此时提取出来的可能是 ip 也有可能是域名，先获取 ip
        $ip = gethostbyname($host_without_protocol);
        // 判断是否是私有 ip
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
            $this->stateInfo = $this->getStateInfo("INVALID_IP");
            return;
        }

        //获取请求头并检测死链
        $heads = get_headers($imgUrl, 1);
        if (!(stristr($heads[0], "200") && stristr($heads[0], "OK"))) {
            $this->stateInfo = $this->getStateInfo("ERROR_DEAD_LINK");
            return;
        }
        //格式验证(扩展名验证和Content-Type验证)
        $fileType = strtolower(strrchr($imgUrl, '.'));
        if (!in_array($fileType, $this->config['allowFiles']) || !isset($heads['Content-Type']) || !stristr($heads['Content-Type'], "image")) {
            $this->stateInfo = $this->getStateInfo("ERROR_HTTP_CONTENTTYPE");
            return;
        }

        //打开输出缓冲区并获取远程图片
        ob_start();
        $context = stream_context_create(
            ['http' => [
                'follow_location' => false // don't follow redirects
            ]]
        );
        readfile($imgUrl, false, $context);
        $img = ob_get_contents();
        ob_end_clean();
        preg_match("/[\/]([^\/]*)[\.]?[^\.\/]*$/", $imgUrl, $m);

        $this->oriName = $m ? $m[1] : "";
        $this->fileSize = strlen($img);
        $this->fileType = $this->getFileExt();
        $this->fullName = $this->getFullName();
        $this->filePath = $this->getFilePath();
        $this->fileName = $this->getFileName();
        $dirname = dirname($this->filePath);

        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return;
        }

        //创建目录失败
        if (!file_exists($dirname) && !mkdir($dirname, 0777, true)) {
            $this->stateInfo = $this->getStateInfo("ERROR_CREATE_DIR");
            return;
        } else if (!is_writeable($dirname)) {
            $this->stateInfo = $this->getStateInfo("ERROR_DIR_NOT_WRITEABLE");
            return;
        }

        //移动文件
        if (!(file_put_contents($this->filePath, $img) && file_exists($this->filePath))) { //移动失败
            $this->stateInfo = $this->getStateInfo("ERROR_WRITE_CONTENT");
        } else { //移动成功
            $this->stateInfo = $this->stateMap[0];
        }

    }

    private function saveAvatar()
    {
        $imgUrl = htmlspecialchars($this->fileField);
        $imgUrl = str_replace("&amp;", "&", $imgUrl);

        //http开头验证
        if (strpos($imgUrl, "http") !== 0) {
            $this->stateInfo = $this->getStateInfo("ERROR_HTTP_LINK");
            return;
        }

        preg_match('/(^https*:\/\/[^:\/]+)/', $imgUrl, $matches);
        $host_with_protocol = count($matches) > 1 ? $matches[1] : '';

        // 判断是否是合法 url
        if (!filter_var($host_with_protocol, FILTER_VALIDATE_URL)) {
            $this->stateInfo = $this->getStateInfo("INVALID_URL");
            return;
        }

        preg_match('/^https*:\/\/(.+)/', $host_with_protocol, $matches);
        $host_without_protocol = count($matches) > 1 ? $matches[1] : '';

        // 此时提取出来的可能是 ip 也有可能是域名，先获取 ip
        $ip = gethostbyname($host_without_protocol);
        // 判断是否是私有 ip
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
            $this->stateInfo = $this->getStateInfo("INVALID_IP");
            return;
        }

        //获取请求头并检测死链
        $heads = get_headers($imgUrl, 1);
        if (!(stristr($heads[0], "200") && stristr($heads[0], "OK"))) {
            $this->stateInfo = $this->getStateInfo("ERROR_DEAD_LINK");
            return;
        }

        //打开输出缓冲区并获取远程图片
        ob_start();
        $context = stream_context_create(
            ['http' => [
                'follow_location' => false // don't follow redirects
            ]]
        );
        readfile($imgUrl, false, $context);
        $img = ob_get_contents();
        ob_end_clean();
        preg_match("/[\/]([^\/]*)[\.]?[^\.\/]*$/", $imgUrl, $m);

        $this->oriName = $m ? $m[1] : "";
        $this->fileSize = strlen($img);
        $this->fileType = $this->getFileExt();
        $this->fullName = $this->getFullName() . '.jpg';
        $this->filePath = $this->getFilePath();
        $this->fileName = $this->getFileName();
        $dirname = dirname($this->filePath);

        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return;
        }

        //创建目录失败
        if (!file_exists($dirname) && !mkdir($dirname, 0777, true)) {
            $this->stateInfo = $this->getStateInfo("ERROR_CREATE_DIR");
            return;
        } else if (!is_writeable($dirname)) {
            $this->stateInfo = $this->getStateInfo("ERROR_DIR_NOT_WRITEABLE");
            return;
        }

        //移动文件
        if (!(file_put_contents($this->filePath, $img) && file_exists($this->filePath))) { //移动失败
            $this->stateInfo = $this->getStateInfo("ERROR_WRITE_CONTENT");
        } else { //移动成功
            $this->stateInfo = $this->stateMap[0];
        }

    }

    /**
     * 上传错误检查
     * @param $errCode
     * @return string
     */
    private function getStateInfo($errCode)
    {
        return !$this->stateMap[$errCode] ? $this->stateMap["ERROR_UNKNOWN"] : $this->stateMap[$errCode];
    }

    /**
     * 获取文件扩展名
     * @return string
     */
    private function getFileExt()
    {
        return strtolower(strrchr($this->oriName, '.'));
    }

    /**
     * 重命名文件
     * @return string
     */
    private function getFullName()
    {
        $this->extToType();
        //替换日期事件
        $t = (time());
        $d = explode('-', date("Y-y-m-d-H-i-s"));
        $format = $this->config["pathFormat"];
        $format = str_replace("{yyyy}", $d[0], $format);
        $format = str_replace("{yy}", $d[1], $format);
        $format = str_replace("{mm}", $d[2], $format);
        $format = str_replace("{dd}", $d[3], $format);
        $format = str_replace("{hh}", $d[4], $format);
        $format = str_replace("{ii}", $d[5], $format);
        $format = str_replace("{ss}", $d[6], $format);
        if (isset($this->config['nameMd5'])) {
            $t = md5($t);
        }
        $format = str_replace("{time}", $t, $format);
        //过滤文件名的非法自负,并替换文件名
        $oriName = substr($this->oriName, 0, strrpos($this->oriName, '.'));
        $oriName = preg_replace("/[\|\?\"\<\>\/\*\\\\]+/", '', $oriName);

        $format = str_replace("{filename}", $oriName, $format);

        //替换随机字符串
        $randNum = mt_rand(1, 100000);

        if (preg_match("/\{rand\:([\d]*)\}/i", $format, $matches)) {
            $format = preg_replace("/\{rand\:[\d]*\}/i", substr($randNum, 0, $matches[1]), $format);
        }

        $ext = $this->getFileExt();
        $filename = ($format) . $ext;

        /**/
        return $filename;
    }

    /**
     * 获取文件名
     * @return string
     */
    private function getFileName()
    {
        return substr($this->filePath, strrpos($this->filePath, '/') + 1);
    }

    /**
     * 获取文件完整路径
     * @return string
     */
    private function getFilePath()
    {
        $fullname = $this->fullName;
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

        if (substr($fullname, 0, 1) != '/') {
            $fullname = '/' . $fullname;
        }

        return $rootPath . $fullname;
    }

    /**
     * 文件类型检测
     * @return bool
     */
    private function checkType()
    {
        return in_array($this->getFileExt(), $this->config["allowFiles"]);
    }

    /**
     * 文件大小检测
     * @return bool
     */
    private function checkSize()
    {
        return $this->fileSize <= ($this->config["maxSize"]);
    }

    private function getImageWH()
    {

        if ($this->config['fileType'] == 'image') {
            $info = getimagesize($this->filePath);
            if (count($info) > 0) {
                $this->width = $info[0];
                $this->height = $info[1];
            }
        }
    }

    /**
     * 获取当前上传成功文件的各项信息
     * @return array
     */
    public function getFileInfo()
    {
        $this->getImageWH();

        return [
            "state" => $this->stateInfo,
            'success' => $this->stateInfo == 'SUCCESS' ? "1" : "0",
            "path" => $this->fullName,
            "filename" => $this->fileName,
            'tmpname' => $this->oriName,
            "abpath" => $this->filePath,
            "ext" => $this->fileType,
            'type' => $this->config['fileType'],
            "width" => $this->width,
            "height" => $this->height,
            "size" => round($this->fileSize / 1024),
            "sizepx" => $this->size(),
            'deletepath' => $this->deletePath(),
            'oss_url' => ''

        ];
    }

    public function extToType()
    {
        $file_suffix = [
            "image" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"],
            "vedio" => [".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
                ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".wav", ".mid"],
            'zip' => ['.zip', '.tar.gz', '.rar', '.tar', ".7z", ".bz2", '.gz'],
            'mp3' => ['.mp3'],
            'office' => [".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt"],
            'excel' => [".xls", ".xlsx"],
            'word' => [".doc", ".docx"],

        ];
        if (in_array($this->getFileExt(), $file_suffix['image'])) {
            $this->config['pathFormat'] = str_replace('file', 'image', $this->config['pathFormat']);
            $this->config['fileType'] = 'image';
        } elseif (in_array($this->getFileExt(), $file_suffix['vedio'])) {
            $this->config['pathFormat'] = str_replace('file', 'vedio', $this->config['pathFormat']);
            $this->config['fileType'] = 'vedio';
        } elseif (in_array($this->getFileExt(), $file_suffix['zip'])) {
            $this->config['pathFormat'] = str_replace('file', 'zip', $this->config['pathFormat']);
            $this->config['fileType'] = 'zip';
        } elseif (in_array($this->getFileExt(), $file_suffix['mp3'])) {
            $this->config['pathFormat'] = str_replace('file', 'mp3', $this->config['pathFormat']);
            $this->config['fileType'] = 'mp3';
        } elseif (in_array($this->getFileExt(), $file_suffix['excel'])) {
            $this->config['pathFormat'] = str_replace('file', 'excel', $this->config['pathFormat']);
            $this->config['fileType'] = 'excel';
        } elseif (in_array($this->getFileExt(), $file_suffix['word'])) {
            $this->config['pathFormat'] = str_replace('file', 'word', $this->config['pathFormat']);
            $this->config['fileType'] = 'word';
        } elseif (in_array($this->getFileExt(), $file_suffix['office'])) {
            $this->config['pathFormat'] = str_replace('file', 'office', $this->config['pathFormat']);
            $this->config['fileType'] = 'office';
        } else {
            $this->config['fileType'] = 'file';
        }
    }

    public function deletePath()
    {
        return str_replace("\\", "/", public_path()) . $this->fullName;
    }

    public function size()
    {
        $size = $this->fileSize;
        $units = [' B', ' KB', ' MB', ' GB', ' TB'];
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2) . $units[$i];
    }

}