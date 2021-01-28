<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use app\admin\validate\Email as emailValidate;
use app\admin\model\Email as emailModel;

class System extends Controller
{
    /**
     * 系统邮件配置
     * @param Request $request
     * @return \think\response\View
     * @throws
     */
    public function emailCreate(Request $request)
    {
        $emailMode = new emailModel();
        if ($request::isGet()) {
            $emailInfo = $emailMode->queryOne();
            return view('email', [
                'emailInfo' => $emailInfo[0]
            ]);
        } elseif ($request::isPost()) {
            // 接受邮件配置数据
            $emailInfo = [
                'company' => trim($request::post('company')),
                'host' => trim($request::post('host')),
                'port' => trim($request::post('port')),
                'agreement' => trim($request::post('agreement')),
                'email' => trim($request::post('email')),
                'password' => trim($request::post('password')),
            ];
            // 验证数据格式
            $emailValidate = new emailValidate();
            $validateRes   = $emailValidate->checkEmail($emailInfo);
            if ($validateRes) {
                $this->error($validateRes);
            } else {
                // 数据入库
                $insertRes = $emailMode->addData($emailInfo);
                if ($insertRes == 1) {
                    $this->success('数据提交成功!', 'admin/System/emailCreate');
                } elseif ($insertRes == 2) {
                    $this->error('数据提交失败!');
                } elseif ($insertRes == 3) {
                    $this->error('数据未发生改变!');
                } else {
                    $this->error($insertRes);
                }
            }
        }
    }
}
