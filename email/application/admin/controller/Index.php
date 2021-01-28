<?php

namespace app\admin\controller;

use think\Request;

class Index
{
    /**
     * 显示资源列表
     * @return \think\Response
     */
    public function index()
    {
        // 系统配置信息
        $sysInfo = [
            'PHP_VERSION' => 'thinkphp 5.1',
            'PWD' => $_SERVER['DOCUMENT_ROOT'],
            'HTTP_HOST' => $_SERVER['HTTP_HOST'],
            'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
            'DISK_TOTAL_SPACE' => number_format(disk_total_space('/') / (1024 * 1024 * 1024), 2)
        ];
        return view('index', [
            'sysInfo' => $sysInfo
        ]);
    }

    /**
     * 显示创建资源表单页.
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
