<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * 删除数据
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function deleteDate($id)
    {
        $sql = new Admin();
        return $sql->where(['id' => $id])->delete();
    }

    /**
     * 查询
     * @return Contract[]|false
     * @throws \think\Exception\DbException
     */
    public function queryAll()
    {
        $admin = new Admin();
        $lists = $admin->field('id,last_name,number,identity,play,i_post')->select();
        return $lists;
    }

    /**
     * 插入数据
     * @param array $data 合同数据
     * @return int
     * @throws \think\Exception\DbException
     */
    public function saveData($data)
    {
        $assess = new Admin();
        $updateArr['last_name'] = $data['last_name'];
        $updateArr['number'] = $data['number'];
        $updateArr['pwd'] = md5($data['pwd']);
        $updateArr['identity'] = $data['identity'];
        $updateArr['play'] = $data['play'];
        $updateArr['i_post'] = $data['i_post'];
        $updateArr['update_time']= date("yy-m-d H:i:s", time());
//        var_dump($updateArr);exit;
        if (array_key_exists('id', $data)) {

            try {
                $updateRes = $assess->update($updateArr, ['id' => $data['id']]);
                if ($updateRes) {
                    return 4;
                } else {
                    return 5;
                }
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

        } else {
            $title = Admin::get(['number' => $data['number']]);
            if ($title) {
                return 1;// 数据存在
            } else {

                try {
                    $updateArr['create_time']= date("yy-m-d H:i:s", time());
                    $inserResult = $assess->save($updateArr);
                    if ($inserResult) {
                        return 2;
                    } else {
                        return 3;
                    }
                } catch (\Exception $exception) {
                    return $exception->getMessage();
                }
            }
        }
    }
}
