<?php

namespace app\index\controller;

use think\facade\Cookie;

class Index
{
    /**
     * 所有模块的公共登录入口
     * @return \think\response\View
     */
    public function index()
    {
        if (Cookie::get('userToken') == false) {
            return view('index');
        } else {
            return redirect('admin/Index/index');
        }
    }

    /**
     * 用户退出登录
     * @return \think\response\Redirect
     */
    public function loginOut()
    {
        Cookie::delete('userToken');
        Cookie::delete('uid');
        Cookie::delete('identity');
        return redirect('index/Index/index');
    }
}
