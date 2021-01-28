<?php

namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use app\index\validate\User as validateUser;
use app\index\model\User as modelUser;

class User extends Controller
{
    /**
     * 用户登录
     */
    public function Login()
    {
        $loginInfo = [
            'number' => trim(Request::post('userNumber')),
            'pwd' => trim(Request::post('userPwd')),
            'check' => Request::post('isCheck')
        ];
        // 验证用户登录信息
        $user        = new validateUser();
        $validateRes = $user->checkUserLogin($loginInfo);
        if ($validateRes) {
            $this->error($validateRes);
        }
        // 用户数据查库
        $modelUser = new modelUser();
        $res       = $modelUser->checkLogin($loginInfo);
//        dump($res);
        if ($res['status'] == 2 && $res['role'] == 4) {
            // 登录成功,用户是管理员
            $this->success($res['mes'], 'admin/Index/index');
        } elseif ($res['status'] == 2 && $res['role'] == 1) {
            //  登录成功，用户是销售人员
            $this->success($res['mes'], 'user/Sale/index');
        } elseif ($res['status'] == 2 && $res['role'] == 2) {
            //  登录成功，用户是工程师
            $this->success($res['mes'], 'user/Engineer/index');
        }
    }

    /**
     * 用户登录
     */
    public function LoginTwo()
    {

        // 用户数据查库
        $modelUser = new modelUser();
        $res       = $modelUser->checkLoginTwo($_REQUEST);
        return $res;
    }
}
