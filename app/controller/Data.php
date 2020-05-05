<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use app\model\Demo;

class Data extends BaseController
{
    public function index()
    {
        //$result = Db::table("mall_demo")->where("id", 2)->find();

        //通过容器的方式处理
        //$result2 = app("db")->table("mall_demo")->where("id", 1)->find();
        $result = Db::table("mall_demo")
            ->order("id", "desc")
            ->limit(1, 2)
            ->select();
        dump($result);
        //dump($result2);
    }

    public function abc()
    {
        //方法1
        //$result = DB::table("mall_demo")->where("id",4)->fetchSql(true)->find();

        //方法2
        $result = DB::table("mall_demo")->where("id", 4)->find();
        echo Db::getLastSql();
        exit();
        dump($result);
    }

    public function model1(){
        //这是一个对象，使用toarry方法使其变成数组
        $result = Demo::find(1);
        dump($result->toArray());
    }

    public function model2(){
        $modelObj =new Demo();
        $result = $modelObj->where("category_id",2)
            ->limit(2)
            ->order("id","desc")
            ->select();

        print_r($result);
    }
}
