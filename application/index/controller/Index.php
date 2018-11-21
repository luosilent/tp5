<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $data = Db::name('data')
            ->where('id','>',1)
            ->limit(10)
            ->select();
        $this->assign('result', $data);
        return $this->fetch();
    }

    public function index2($name = '')
    {
        if ('thinkphp' == $name) {
            $this->success('欢迎使用ThinkPHP5.0', 'he');
        } else {
            $this->error('错误的name', 'guest');
        }
    }

    public function hello($name = 'World')
    {
        echo 'url: ' . $this->request->url(true) . '<br/>';
        echo 'url: ' . $this->request->baseUrl() . '<br/>';
        echo 'name1:' . $this->request->param('name') . '<br/>';
        echo 'name2:' . $this->request->post('name') . '<br/>';
        echo 'ip:' . $this->request->ip() . '<br/>';

        return 'Hello,' . $name . '！' . '<br/>';
    }

    public function he()
    {
        return 'Hello,ThinkPHP!';
    }

    public function guest()
    {
        return 'Hello,Guest!';
    }
}