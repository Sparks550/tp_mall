<?php

namespace app\controller;

use app\Request;

class Learn{
    public function index(Request $request){
        dump($request->param("abc"));
    }
}