<?php

namespace app\demo\controller;

use app\BaseController;
use app\demo\Model\Demo;

class M extends BaseController
{
    public function index()
    {
        //获取数据表数据
        $categoryId = $this->request->param("category_id", 0, "intval");
        if (empty($categoryId)) {
            return show(config("status.error"), "参数错误");
        }
        $model = new Demo();
        //从url获取值
        $results = $model->getDemoDataByCategoryId($categoryId);
        if (empty($results)) {
            return show(config("status.success"), "数据为空");
        }

        //获取config的‘category’文件信息,并对category_id做映射
        $cagegorys = config("category");
        foreach ($results as $key => $result) {
            //isset($cagegorys[$result["category_id"] ? $cagegorys[$result["category_id]] : "其他";
            $results[$key]['categoryName'] = $cagegorys[$result["category_id"]] ?? "其他";
        }
        return show(config("status.success"), "ok", $results);

    }
}