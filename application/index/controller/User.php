<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/11/22
 * Time: 9:30
 */

namespace app\index\controller;

use app\index\model\User as UserModel;

class User
{

    // 创建用户数据页面
    public function create()
    {
        return view('index/user/create');
    }
    // 新增用户数据
    public function add()
    {
        $user = new UserModel;
        if ($user->allowField(true)->validate(true)->save(input('post.'))) {
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }
    // 读取用户数据
    public function read($id = '')
    {
        $user = UserModel::get($id);
        echo '<br/>'.$user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo $user->birthday . '<br/>';

    }

    // 获取用户数据列表
    public function index(){
        $list = UserModel::scope('email')->select();
        foreach ($list as $user) {
            echo '<br/>'.$user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo $user->birthday . '<br/>';
            echo $user->status . '<br/>';
            echo $user->create_time . '<br/>';
            echo $user->update_time . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    // 更新用户数据
    public function update($id)
    {
        $user['id'] = (int) $id;
        $user['nickname'] = 'luo';
        $user['email'] = 'luo@gmail.com';
        $result = UserModel::update($user);
        if ($result)
            return '更新用户成功';
        else
            return '更新用户失败';
    }

    // 删除用户数据
    public function delete($id)
    {
        $user = UserModel::get($id);
        if ($user) {
            $user->delete();
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }


}