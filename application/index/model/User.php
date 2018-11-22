<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/11/22
 * Time: 9:27
 */

namespace app\index\model;
use think\Model;
class User extends Model
{
    // 设置完整的数据表（包含前缀）
    protected $table = 'think_user';

    // 定义类型转换
    protected $type = [
        'birthday' => 'datetime:Y-m-d',
    ];
    // 指定自动写入时间戳的类型为dateTime类型
    protected $autoWriteTimestamp = 'datetime';
    // 定义自动完成的属性
    protected $insert = ['status'];

    // status属性修改器
    protected function setStatusAttr($value, $data)
    {
        return 'luo' == $data['nickname'] ? 1 : 2;
    }
    // status属性读取器
    protected function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }

    // email查询
    protected function scopeEmail($query)
    {
        $query->where('email', 'luosilent@qq.com');
    }

    // 全局查询范围
    protected static function base($query)
    {
        // 查询状态为1的数据
        $query->where('status',1);
    }
}