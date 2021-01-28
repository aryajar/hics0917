<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Customer;
use app\admin\model\User;
use app\admin\model\Yard;
use think\Db;
use think\facade\Request;
use app\admin\validate\Assess as AssessValidate;
use app\admin\model\Assess as AssessModel;
use app\admin\model\Yard as YardModel;

class Yards extends Controller
{


    /**
     * 删除
     * @return bool
     * @throws \Exception
     */
    public function del()
    {
        $model     = new AssessModel();
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
        $yard        = new Yard();
        $yards     = $yard->queryYardList();
        return view('index', [
            'yards' => $yards
        ]);
    }

    /**
     * 查询列表
     * @return \think\response\View
     * @throws \think\Exception\DbException
     */
    public function indexList()
    {
        $model     = new AssessModel();
        $lists = $model->queryAll($_POST);
        return $lists;
    }



}
