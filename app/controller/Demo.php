<?php

namespace app\controller;

use app\BaseController;

class Demo extends BaseController
{
    public function show()
    {
        return "121dadada";
    }

    public function request(){
        dump($this->request->param("abc",1,"intval"));
    }
}