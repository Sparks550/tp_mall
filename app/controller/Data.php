<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Data extends BaseController
{
    public function index()
    {
        //$result = Db::table("mall_demo")->where("id", 2)->find();

        //通过容器的方式处理
        //$result2 = app("db")->table("mall_demo")->where("id", 1)->find();
        $result = Db::table("mall_demo")
            ->order("id","desc")
            ->limit(1,2)
            ->select();
        dump($result);
        //dump($result2);
    }
}
