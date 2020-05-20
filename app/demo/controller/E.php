<?php

namespace app\demo\controller;

use app\BaseController;

class E extends BaseController
{
    public function index()
    {
      throw new \think\Exception\HttpException(404,"找不到相应的数据");
    }
}