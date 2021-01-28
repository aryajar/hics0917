<?php

namespace app\index\model;

use app\admin\model\Admin;
use think\facade\Cookie;
use think\Model;
use think\facade\Cache;

class User extends Model
{
    public function checkLogin($userInfo)
    {
        // 设置返回信息
        $status = [
            'status' => '',
            'mes' => '',
            'role' => ''
        ];
        try {
            $user = User::get(['number' => $userInfo['number']]);
            if (empty($user)) {
                // 账号不存在
                $status['status'] = 1;
                $status['mes']    = '账号不存在';
            } else {
                // 核对用户信息是否正确
                if ($user['pwd'] == md5($userInfo['pwd'])) {
                    // 密码一致
                    $status['status'] = 2;
                    $status['mes']    = '登录成功';
                    $status['role']   = $user['type'];
                    // 登录成功设置session
                    Cookie::set('userToken', md5(time()));
                    Cookie::set('uid', ($user->id) . "$" . time());
                    Cache::set('uid' . $user->id, $user['last_name'] . $user['first_name']);
                } elseif ($user['pwd'] != md5($userInfo['pwd'])) {
                    // 密码不正确
                    $status['status'] = 3;
                    $status['mes']    = '密码不正确';
                }
            }
        } catch (\Exception $exception) {
            $status['mes'] = $exception->getMessage();
        }
        return $status;
    }

    public function checkLoginTwo($date)
    {
        // 设置返回信息
        $status = [
            'code' => '',
            'msg' => ''
        ];
        try {
            $admin = new Admin();
            $userInfo = $admin->field('id,number,last_name,pwd,identity')->where(['number' => $date['number']])->find();
            if (empty($userInfo)) {
                // 账号不存在
                $status['code'] = 1;
                $status['msg']    = '账号不存在';
            } else {
                // 核对用户信息是否正确
                if ($userInfo['pwd'] == md5($date['pwd'])) {
                    // 密码一致
                    $status['code'] = 2;
                    $status['msg']    = '登录成功';
                    // 登录成功设置session
                    Cookie::set('userToken', md5(time()));
                    Cookie::set('uid', ($userInfo['id']) . "$" . time());
                    Cookie::set('stuId', ($userInfo['id']));
                    Cookie::set('identity', $userInfo['identity']);
                } elseif ($userInfo['pwd'] != md5($date['pwd'])) {
                    // 密码不正确
                    $status['code'] = 3;
                    $status['msg']    = '密码不正确';
                }
            }
        } catch (\Exception $exception) {
            $status['msg'] = $exception->getMessage();
        }
        return $status;
    }
}
