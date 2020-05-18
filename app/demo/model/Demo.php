<?php

namespace app\demo\model;

use think\model;
class Demo extends Model
{
    public function getDemoDataByCategoryId($categoryId, $limit = 10)
    {
        if(empty(($categoryId))){
            return [];
        }
        $results = $this->where("category_id", $categoryId)
            ->limit($limit)
            ->order("id", "desc")
            ->select()
            ->toArray();

        return $results;

    }
}