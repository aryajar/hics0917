<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Assess extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * 查询
     * @return Contract[]|false
     * @throws \think\Exception\DbException
     */
    public function queryAll($date)
    {
        $sql = "select a.*, y.`name` as yard_name, s.`name` as system_name, u.last_name as stu_name, u.score as u_score  from db_assess as a 
        LEFT JOIN db_yard as y on a.yard_id = y.id LEFT JOIN db_system as s on a.system_id = s.id  LEFT JOIN db_admin as u on a.stu_id = u.id where 1";
        if(array_key_exists('yard_id', $date) && $date['yard_id']){
            $sql .= " and a.yard_id = " .$date['yard_id'];
        }
        if(array_key_exists('system_id', $date) && $date['system_id']){
            $sql .= " and a.system_id = " .$date['system_id'];
        }
        if(array_key_exists('stu_name', $date) && $date['stu_name']){
            $sql .= " and u.last_name like '%" .$date['stu_name'] ."%'";
        }
        if($_COOKIE['identity'] != null && $_COOKIE['identity'] == 2){
            $sql .= " and a.stu_id = ". $_COOKIE['stuId'];
        }
        $lists = Db::query($sql);
        return $lists;
    }

    /**
     * 判断日期区间是否存在
     * @param $date
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     *
     */
    public function checkDate($date)
    {

        $assess = new Assess();
        $all = $assess->field('id')->where([
            'stu_id' => $_COOKIE['stuId']
        ])->select();
        $list = $assess->field('id')->where([
            'starttime' => $date['starttime'],
            'endtime' => $date['endtime'],
            'stu_id' => $_COOKIE['stuId']
        ])->select();
        if(count($all) > 0){
            if(count($list)>0){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }

    }

    /**
     * 计算成绩
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function scoreDate()
    {
//        $_COOKIE['stuId'] = 23;
//        $_COOKIE['identity'] = 2;
        if($_COOKIE['identity'] != null && $_COOKIE['identity'] == 2){
            /*$grade = 0;*/
            $assess = new Assess();
            $list = $assess->field('starttime,endtime,date,score')->where(['stu_id' => $_COOKIE['stuId']])->select();
            $scoreSum = $assess->where(['stu_id' => $_COOKIE['stuId']])->sum('score');
            if($list){
                $days = $this->diffBetweenTwoDays($list[0]['starttime'], $list[0]['endtime']);
                $days = $days + 1;

                //计算日记成绩（日记改成了备注）     这部分就没注释了，怕影响上面的days
                if( $days - count($list) == 1){
                    $total = 90;
                }

                /*$score = round((100/(100*$days))*$scoreSum);*/
                $score = round($scoreSum);

                $adminModel = new Admin();
                $adminModel->update(['score' => $score], ['id' => $_COOKIE['stuId']]);//total和grade删掉了，有需要可以再添加

                //依从率=手卫生次数/时机数； 正确率=正确数/时机数。
                $volume = $assess->where(['volume' => $_COOKIE['volume']]);
                $comply = round($assess->where(['base_type' => $_COOKIE['base_type']])/$volume);

                $correct = round($assess->where(['score' => $_COOKIE['score']])/$volume);

                $result = [
                    'code' => 200,
/*                    'show' => $show,
                    'total' => $total,*/
                    'score' => $score,
                    /*'grade' => $grade*/
                    'comply' => $comply,
                    'correct' => $correct
                ];
                return $result;

            }
        }
        return [
            'code' => 400,
            'msg' => '请创建你的日记'
        ];
    }

    /**
     * 求两个日期之间相差的天数
     * (针对1970年1月1日之后，求之前可以采用泰勒公式)
     * @param string $day1
     * @param string $day2
     * @return number
     */
    function diffBetweenTwoDays ($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }

    /**
     * 插入数据
     * @param array $data 合同数据
     * @return int
     * @throws \think\Exception\DbException
     */
    public function saveData($data)
    {
        if(array_key_exists('id', $data)){
            $updateArr['yard_id']  = $data['yard'];
            $updateArr['system_id']  = $data['system'];
            $updateArr['internship_type'] = $data['internship_type'];
            $updateArr['volume']= $data['volume'];
            $updateArr['base_type']= $data['base_type'];
            $updateArr['has_guide']= $data['has_guide'];
            $updateArr['count'] = $data['count'];
            $updateArr['time']= $data['time'];
            $updateArr['starttime']  = $data['starttime'];
            $updateArr['endtime']= $data['endtime'];
            $updateArr['date'] = $data['date'];
            $updateArr['content']  = $data['content'];
            $updateArr['status_one'] = $data['status_one'];
            $updateArr['status_two']  = $data['status_two'];
            $updateArr['status_three'] = $data['status_three'];
            $updateArr['status_four']  = $data['status_four'];
            $updateArr['status_five']  = $data['status_five'];
            $updateArr['status_six']= $data['status_six'];
            $updateArr['status_seven']= $data['status_seven'];
            $updateArr['status_eight']= $data['status_eight'];
            $updateArr['status_nine']= $data['status_nine'];
            $updateArr['status_ten']= $data['status_ten'];
            $updateArr['status_eleven']= $data['status_eleven'];
            $updateArr['status_twelve']= $data['status_twelve'];
            $updateArr['status_thirteen']= $data['status_thirteen'];
            $updateArr['update_time']= date("yy-m-d H:i:s", time());
            $score = 0;
            if($data['status_one'] == 1){
                $score += 1;
            }
            if($data['status_two'] == 1){
                $score += 1;
            }
            if($data['status_three'] == 1){
                $score += 1;
            }
            if($data['status_four'] == 1){
                $score += 1;
            }
            if($data['status_five'] == 1){
                $score += 1;
            }
/*            if($data['status_six'] == 1){
                $score += 5;
            }
            if($data['status_seven'] == 1){
                $score += 10;
            }
            if($data['status_eight'] == 1){
                $score += 10;
            }
            if($data['status_nine'] == 1){
                $score += 10;
            }
            if($data['status_ten'] == 1){
                $score += 5;
            }
            if($data['status_eleven'] == 1){
                $score += 5;
            }
            if($data['status_twelve'] == 1){
                $score += 10;
            }
            if($data['status_thirteen'] == 1){
                $score += 10;
            }*/
            $updateArr['score']= $score;
            $assess = new Assess();
            try {
                $updateRes      = $assess->update($updateArr, ['id' => $data['id']]);
                if ($updateRes) {
                    return 4;
                } else {
                    return 5;
                }
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

        }else{
            $title = Assess::get(['stu_id' => $data['stu_id'], 'date' => $data['date']]);
            if ($title) {
                return 1;// 数据存在
            } else {
                $assess                     = new Assess();
                $assess->yard_id              = $data['yard'];
                $assess->system_id           = $data['system'];
                $assess->internship_type             = $data['internship_type'];
                $assess->volume               = $data['volume'];
                $assess->base_type               = $data['base_type'];
                $assess->has_guide               = $data['has_guide'];
                $assess->count = $data['count'];
                $assess->time   = $data['time'];
                $assess->starttime     = $data['starttime'];
                $assess->endtime      = $data['endtime'];
                $assess->date       = $data['date'];
                $assess->content        = $data['content'];
                $assess->status_one    = $data['status_one'];
                $assess->status_two  = $data['status_two'];
                $assess->status_three       = $data['status_three'];
                $assess->status_four     = $data['status_four'];
                $assess->status_five     = $data['status_five'];
                $assess->status_six      = $data['status_six'];
                $assess->status_seven      = $data['status_seven'];
                $assess->status_eight      = $data['status_eight'];
                $assess->status_nine      = $data['status_nine'];
                $assess->status_ten      = $data['status_ten'];
                $assess->status_eleven      = $data['status_eleven'];
                $assess->status_twelve      = $data['status_twelve'];
                $assess->status_thirteen      = $data['status_thirteen'];
                $assess->create_time      = date("yy-m-d H:i:s", time());
                $assess->update_time      = date("yy-m-d H:i:s", time());
                $assess->stu_id      = $data['stu_id'];
                $score = 0;
                if($data['status_one'] == 1){
                    $score += 1;
                }
                if($data['status_two'] == 1){
                    $score += 1;
                }
                if($data['status_three'] == 1){
                    $score += 1;
                }
                if($data['status_four'] == 1){
                    $score += 1;
                }
                if($data['status_five'] == 1){
                    $score += 1;
                }
             /*   if($data['status_six'] == 1){
                    $score += 5;
                }
                if($data['status_seven'] == 1){
                    $score += 10;
                }
                if($data['status_eight'] == 1){
                    $score += 10;
                }
                if($data['status_nine'] == 1){
                    $score += 10;
                }
                if($data['status_ten'] == 1){
                    $score += 5;
                }
                if($data['status_eleven'] == 1){
                    $score += 5;
                }
                if($data['status_twelve'] == 1){
                    $score += 10;
                }
                if($data['status_thirteen'] == 1){
                    $score += 10;
                }*/
                $assess->score      = $score;

                try {
                    $inserResult = $assess->allowField(true)->save();
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

    /**
     * 查询详情
     * @param $id
     * @return Assess|null
     * @throws \think\Exception\DbException
     */
    public function queryOne($id)
    {
        $query = new Assess();
        $detail = $query->field(['id,internship_type,base_type,volume,has_guide,count,starttime,endtime,status,stu_id,system_id,yard_id,content,status_one,status_two,status_three,status_four,status_five,date,score'])
            ->find(['id' => $id]);
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
        $sql = "select a.id,a.internship_type,a.base_type,a.volume,a.has_guide,a.count,a.starttime,a.endtime,a.status,a.stu_id,a.system_id,a.yard_id,a.content,a.status_one,a.status_two,a.status_three,a.status_four,a.status_five,a.date,a.score,a.comply,a.correct,  
        y.`name` as yard_name, s.`name` as system_name  from db_assess as a 
        LEFT JOIN db_yard as y on a.yard_id = y.id LEFT JOIN db_system as s on a.system_id = s.id  where a.id" . $id;
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
        $sql = new Assess();
        return $sql->where(['id' => $id])->delete();
    }
}
