<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    // 验证规则
    protected $rule = [
        'number' => 'require',
        'pwd' => 'require'
    ];
    // 验证消息
    protected $message = [
        'number.require' => '用户账号不能为空',
        'pwd.require' => '用户密码不能为空'
    ];

    /**
     * 验证用户登录信息
     * @param $userInfo array 用户登录信息
     * @return bool
     */
    public function checkUserLogin($userInfo)
    {
        $validate    = new Validate($this->rule, $this->message);
        $validateRes = $validate->check($userInfo);
        if ($validateRes) {
            return false;
        } else {
            return $validate->getError();
        }
    }
}
