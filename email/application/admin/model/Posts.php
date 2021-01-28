<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Posts extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * 查询
     * @return Contract[]|false
     * @throws \think\Exception\DbException
     */
    public function queryAll($date)
    {

        $sql = "select p.*, y.`name` as yard_name, s.`name` as system_name, u.last_name as stu_name, u.score as u_score, u.total as total, u.grade as grade  from db_posts as p 
        LEFT JOIN db_yard as y on p.yard_id = y.id LEFT JOIN db_system as s on p.system_id = s.id  LEFT JOIN db_admin as u on p.stu_id = u.id where 1";

        if(array_key_exists('title', $date) && $date['title'] != ''){
            $sql .= " and p.title like '%" .$date['title'] ."%'";
        }
        $lists = Db::query($sql);
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
        $assess = new Posts();
        $updateArr['title'] = $data['title'];
        $updateArr['system_id'] = $data['system'];
        $updateArr['yard_id'] = $data['yard'];
        $updateArr['content'] = $data['content'];
        $updateArr['stu_id'] = $data['stu_id'];
        $date = strtotime("now") ;
        $updateArr['update_time']= $date;
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
            try {
                $updateArr['create_time']= $date;
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

    /**
     * 回帖
     * @param $data
     * @return Posts
     */
    public function replySave($data)
    {
        $date = strtotime("now") ;
        $stuId = $_COOKIE['stuId'];
//        $stuId = 22;
        $sql = "INSERT INTO `db_posts_reply`(`content`, `stu_id`, `create_time`, `posts_id`) VALUES ( '".$data['content']."', ".$stuId.", ".$date.", ".$data['posts_id'].")";
        $detail = Db::query($sql);
        return $detail;
    }

    /**
     * 查询详情
     * @param $id
     * @return Assess|null
     * @throws \think\Exception\DbException
     */
    public function queryOne($id)
    {
        $sql = "select p.*, y.`name` as yard_name, s.`name` as system_name, u.last_name as stu_name, u.score as u_score, u.total as total, u.grade as grade  from db_posts as p 
        LEFT JOIN db_yard as y on p.yard_id = y.id LEFT JOIN db_system as s on p.system_id = s.id  LEFT JOIN db_admin as u on p.stu_id = u.id where p.id = " . $id;
        $detail = Db::query($sql);
        return $detail;
    }

    /**
     * 帖子回复
     * @param $id
     * @return mixed
     */
    public function queryReplyOne($id)
    {
        $sql = "select * from db_posts_reply where posts_id = " . $id;
        $detail = Db::query($sql);
        return $detail;
    }

    /**
     * 查询详情
     * @param $id
     * @return Assess|null
     * @throws \think\Exception\DbException
     */
    public function queryDetail($id)
    {
        $sql = "select a.id,a.internship_type,a.base_type,a.volume,a.has_guide,a.count,a.starttime,a.endtime,a.status,a.stu_id,a.system_id,a.yard_id,a.content,a.status_one,a.status_two,a.status_three,a.status_four,a.status_five,a.status_six,a.status_seven,a.status_eight,a.status_nine,a.status_ten,a.status_eleven,a.status_twelve,a.status_thirteen,a.date,a.score, 
        y.`name` as yard_name, s.`name` as system_name  from db_assess as a 
        LEFT JOIN db_yard as y on a.yard_id = y.id LEFT JOIN db_system as s on a.system_id = s.id  where a.id = " . $id;
        $detail = Db::query($sql);
        return $detail;
    }


    /**
     * 删除数据
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function deleteDate($id)
    {
        $sql = new Posts();
        return $sql->where(['id' => $id])->delete();
    }
}
