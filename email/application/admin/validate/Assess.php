<?php

namespace app\admin\validate;

use think\Validate;

class Assess extends Validate
{
    // 创建数据验证规则
    protected $rule = [
        'yard' => 'require',
        'system' => 'require',
        'internship_type' => 'require',
/*        'base_type' => 'require|max:32',
        'volume' => 'require',
        'has_guide' => 'require',*/
        /*'content' => 'require',*/
        'status_one' => 'require',
        'status_two' => 'require',
        'status_three' => 'require',
        'status_four' => 'require',
        'status_five' => 'require',
        'status_six' => 'require',
        'status_seven' => 'require',
        'status_eight' => 'require',
        'status_nine' => 'require',
        'status_ten' => 'require',
        'status_eleven' => 'require',
        'status_twelve' => 'require',
        'status_thirteen' => 'require'
/*        'starttime' => 'require',
        'endtime' => 'require'*/
    ];
    // 创建数据验证规则消息
    protected $message = [
        'yard.require' => '一级科室为必填选项',
        'system.require' => '二级科室为必填选项',
        'internship_type.require' => '检查类型必填',
/*        'base_type.require' => '手卫生次数必填',
        'base_type.min' => '手卫生次数应大于1',
        'volume.require' => '时机数必填',*/
        /*'has_guide.require' => '是否有人指导必选',*/   //这个没用到
        /*'content.require' => '备注必填',*/
        /*'starttime.require' => '实习日期必填',
        'endtime.require' => '实习日期必填',*/
        'status_one.require' => '指标1必选',
        'status_two.require' => '指标2必选',
        'status_three.require' => '指标3必选',
        'status_four.require' => '指标4必选',
        'status_five.require' => '指标5必选',
        'status_six.require' => '评价指标6必选',
        'status_seven.require' => '评价指标7必选',
        'status_eight.require' => '评价指标8必选',
        'status_nine.require' => '评价指标9必选',
        'status_ten.require' => '评价指标10必选',
        'status_eleven.require' => '评价指标11必选',
        'status_twelve.require' => '评价指标12必选',
        'status_thirteen.require' => '评价指标13必选'
    ];

    /**
     * 验证合同数据合法性
     * @param array $data 验证数据
     * @return array|bool
     */
    public function checkContract($data)
    {
        $validate       = new Validate($this->rule, $this->message);
        $validateResult = $validate->check($data);
        if ($validateResult) {
            return false;
        } else {
            return $validate->getError();
        }
    }
}
