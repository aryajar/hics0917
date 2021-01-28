<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Log;
use think\facade\Request;
use app\admin\validate\User as validateUser;
use app\admin\model\Admin as adminModel;
use app\admin\model\Role as modelRole;

class Admin extends Controller
{

    /**
     * 删除
     * @return bool
     * @throws \Exception
     */
    public function del()
    {
        $model     = new adminModel();
        $lists = $model->deleteDate($_REQUEST['id']);

        return $lists;
    }

    /**
     * 查询列表
     * @return \think\response\View
     * @throws \think\Exception\DbException
     */
    public function index()
    {
        $model     = new adminModel();
        $lists = $model->queryAll($_REQUEST);
        return view('index', [
            'lists' => $lists
        ]);
    }

    /**
     * 查询列表
     * @return \think\response\View
     * @throws \think\Exception\DbException
     */
    public function indexList()
    {
        $model     = new adminModel();
        $lists = $model->queryAll($_REQUEST);
        return $lists;
    }

    public function create(Request $request)
    {
        return view('create', [
            'code' => 200
        ]);
    }

    /**
     * 用户创建
     * @param Request $request
     * @return array
     * @throws \think\Exception\DbException
     */
    public function save(Request $request)
    {
        // 数据入库操作
        $contract = new adminModel();
        $inserRes = $contract->saveData($_REQUEST);
        if ($inserRes == 4) {
            $result = [
                'code' => 200,
                'msg' => '编辑成功'
            ];
        }elseif ($inserRes == 5) {
            $result = [
                'code' => 400,
                'msg' => '编辑失败'
            ];
        }elseif ($inserRes == 1) {
            $result = [
                'code' => 400,
                'msg' => '该用户账号已存在'
            ];
        } elseif ($inserRes == 2) {
            $result = [
                'code' => 200,
                'msg' => '添加成功'
            ];
        } else {
            $result = [
                'code' => 200,
                'msg' => '添加失败'
            ];
        }
//        var_dump($result);exit;
        return $result;
    }

}

