<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/11/23
 * Time: 13:37
 */
namespace app\index\validate;
use think\Validate;
class User extends Validate
{
// 验证规则
    protected $rule = [
        ['nickname', 'require|min:5', '昵称必须|昵称不能短于5个字符'],
        ['email', 'email', '邮箱格式错误'],
        ['birthday', 'dateFormat:Y-m-d', '生日格式错误'],
    ];
}