<?php
/**
 * Created by PhpStorm.
 * User: qiqi
 * Date: 2018/12/9
 * Time: 12:08
 * Email: 1005349393@qq.com
 */

namespace app\userdefined\controller;

use think\Controller;
use think\Image;

class DefinedUploadFile extends Controller
{
    /**
     * 单文件上传
     * @return \think\response\Json
     */
    public function getFile()
    {
        // 获取文件信息
        $file = \request()->file('customerFile');
        // 保存文件
        $fileInfo = $file->move(ROOT_PATH . '/uploads/');
        // 获取文件的相对路径
        $filePath = '/uploads/' . $fileInfo->getSaveName();
        // 文件处理
        $image        = Image::open(ROOT_PATH . $filePath);
        $realFilePath = '/thumb/' . time() . '.png';
        $image->thumb(150, 150, $image::THUMB_SCALING)->save(ROOT_PATH . $realFilePath);
        return json(['code' => 200, 'msg' => '接受消息', 'data' => [
            'imgSrc' => $realFilePath,
        ]]);
    }
}