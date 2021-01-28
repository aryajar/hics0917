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

class Assess extends Controller
{

    /**
     * 详情
     * @return AssessModel|null
     * @throws \think\Exception\DbException
     */
    public function read($id)
    {
        $model     = new AssessModel();
        $lists = $model->queryOne($id);
        $yard        = new Yard();
        $yards     = $yard->queryYardList();
        return view('read', [
            'yards' => $yards,
            'lists' => $lists
        ]);
    }

    /**
     * 详情
     */
    /**
     * @return AssessModel|null
     * @throws \think\Exception\DbException
     */
    public function detail()
    {
        $model     = new AssessModel();
        $detail = $model->queryDetail($_REQUEST['id']);
        $result = [
            'code' => 200,
            'msg' => $detail
        ];
        return $result;

    }

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
        $model     = new AssessModel();
        $lists = $model->queryAll($_GET);
        $yards     = $yard->queryYardList();
        return view('index', [
            'lists' => $lists,
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

    /**
     * 一级科室视图渲染
     * @return \think\response\View
     * @throws \think\Exception\DbException
     */
    public function create()
    {
        // 查询科室
        $yard        = new Yard();
        $yards     = $yard->queryYardList();
        return view('create', [
            'yards' => $yards
        ]);
    }

    /**
     * 二级科室视图渲染
     * @return \think\response\View
     * @throws \think\Exception\DbException
     */
    public function system(Request $request)
    {
        // 查询科室
        $yard         = new Yard();
        $yardId = trim($request::post('yardId'));
        $yards     = $yard->querySystemList($yardId);
        return  $yards;
    }

    /**
     * 计算成绩
     * @return mixed
     */
    public function scoreDate()
    {
        $assess         = new AssessModel();
        $result     = $assess->scoreDate();
        return  $result;
    }


    /**
     *  日记创建
     * @param Request $request
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function save(Request $request)
    {
        $_POST['stu_id'] = explode('$',$_COOKIE['uid'])[0];
//        // 验证数据合法性
        $contract = new AssessModel();
        $validate    = new AssessValidate();
        $validateRes = $validate->checkContract($_REQUEST);
        $checkDate = $contract->checkDate($_REQUEST);

        if ($validateRes) {
            $result = [
                'code' => 400,
                'msg' => $validateRes
            ];
        }else{
            if(!$checkDate){
                $result = [
                    'code' => 400,
                    'msg' => '检查开始与结束时间填写的与之前不一致'
                ];
            }else{
                // 数据入库操作
                $inserRes = $contract->saveData($_POST);

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
                }/*elseif ($inserRes == 1) {
                    $result = [
                        'code' => 400,
                        'msg' => '该日期的备注已存在'
                    ];
                }*/ elseif ($inserRes == 2) {
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
            }
        }
        return $result;

    }


}
