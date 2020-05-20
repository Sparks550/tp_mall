<?php

namespace app\demo\controller;

use app\BaseController;
use app\common\business\Demo;

class M extends BaseController
{
    public function index()
    {
        //获取url传入的数据
        $categoryId = $this->request->param("category_id", 0, "intval");
        if (empty($categoryId)) {
            return show(config("status.error"), "参数错误");
        }

        $demo = new Demo();
        $results = $demo->getDemoDataByCategoryId($categoryId);
        return show(config("status.success"), "ok", $results);
    }
}