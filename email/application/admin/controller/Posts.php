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
use app\admin\model\Posts as PostsModel;
use app\admin\model\Yard as YardModel;

class Posts extends Controller
{

    /**
     * 详情
     * @return AssessModel|null
     * @throws \think\Exception\DbException
     */
    public function read($id)
    {
        $model     = new PostsModel();
        $detail = $model->queryOne($id);
        $lists = $model->queryReplyOne($id);
        return view('read', [
            'lists' => $lists,
            'detail' => $detail
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
        $model     = new PostsModel();
        $detail = $model->queryOne($_REQUEST['id']);
        $lists = $model->queryReplyOne($_REQUEST['id']);
        $result = [
            'code' => 200,
            'msg' => $detail,
            'lists' => $lists
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
        $model     = new PostsModel();
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
        $model     = new PostsModel();
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
     * 回帖
     * @return array
     */
    public function reply()
    {
        $model     = new PostsModel();
        $lists = $model->replySave($_REQUEST);
        return [
            'code' => 200,
            'msg' => "回帖成功"
        ];
    }


    /**
     *  创建
     * @param Request $request
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function save(Request $request)
    {
        $_POST['stu_id'] = $_COOKIE['stuId'];
        // 数据入库操作
        $model         = new PostsModel();
        $inserRes = $model->saveData($_POST);

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
                'msg' => '该数据已存在'
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

        return $result;

    }


}
