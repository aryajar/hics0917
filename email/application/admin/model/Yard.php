<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Yard extends Model
{
    protected $autoWriteTimestamp = true;



    /**
     * 查询所有院
     * @return User[]|false
     * @throws \think\Exception\DbException
     */
    public function queryYardList()
    {
        $lists = Yard::all();
        return $lists;
    }

    /**
     * 查询所有系
     * @param $yard_id
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function querySystemList($yard_id)
    {
        $lists = Db::table('db_system')->where(['yard_id' => $yard_id])->select();
        return $lists;
    }

    /**
     * 新增院
     * @param $date
     * @return int
     */
    public function saveYard($date)
    {
        $yard = new Yard();
        $yard->save($date);
        return 1;
    }


}
