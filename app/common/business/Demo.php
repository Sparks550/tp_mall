<?php

namespace app\common\business;

use app\common\model\mysql\demo as DemoModel;

class Demo
{
    public function getDemoDataByCategoryId($categoryId, $limit = 10)
    {
        //逻辑层通过getDemoDataByCategoryId来获取数据
        $model = new DemoModel();
        //从url获取值
        $results = $model->getDemoDataByCategoryId($categoryId);
        if (empty($results)) {
            return [];
        }

        //获取config的‘category’文件信息,并对category_id做映射
        $cagegorys = config("category");
        foreach ($results as $key => $result) {
            //isset($cagegorys[$result["category_id"] ? $cagegorys[$result["category_id]] : "其他";
            $results[$key]['categoryName'] = $cagegorys[$result["category_id"]] ?? "其他";
        }
        return $results;
    }
}