<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $data = Db::name('data')->select();
        $this->assign('result', $data);
        return $this->fetch();
    }
    public function hello(Request $request, $name = 'World')
    {
        echo 'url: ' . $request->url() . '<br/>';
        return 'Hello,' . $name . '！';
    }
}