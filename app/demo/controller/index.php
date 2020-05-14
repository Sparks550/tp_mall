<?php
namespace app\demo\controller;

use app\BaseController;

class Index extends BaseController{
    public function abc(){
        echo "1451";
    }

    public function hello(){
        return time();
    }

}