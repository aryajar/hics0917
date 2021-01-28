<?php

namespace app\http\middleware;

use think\facade\Session;

/**
 * 检测用户登录中间件
 * Class LoginCheck
 * @package app\http\middleware
 */
class LoginCheck
{
    /**
     * 登录前置操作，验证用户在进行操作时是否进行了登录
     * @param $request
     * @param \Closure $next
     * @return mixed|\think\response\Redirect
     */
    public function handle($request, \Closure $next)
    {
        if (Session::get('userLoginToken') == false) {
            return redirect('index/Index/index');
        }
        return $next($request);
    }
}
