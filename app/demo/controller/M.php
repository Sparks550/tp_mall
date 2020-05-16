<?php
namespace app\demo\controller;

use app\BaseController;
use app\Model\Demo;

class M extends  BaseController{
    public function index(){
        //获取数据表数据
        $categoryId = $this->request->param("category_id",0,"intval");
        if(empty($categoryId)){
            return show(config("status.error"),"参数错误");
        }
        $model = new Demo();
        //从url获取值
        $results = $model->where("category_id",$categoryId)
            ->limit(10)
            ->order("id","desc")
            ->select();

        $cagegorys = config("category");
        foreach($results as $key => $result){
            $results[$key]['categoryName'] = $cagegorys[[$results["category_id"]] ?? "其他";
        }
        return show(config("status.success"),"ok",$results);

    }
}