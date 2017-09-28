<?php

namespace app\api\controller;

use think\Request;

class Test
{
    public function hello(Request $request)
    {
        // $name = Request::instance() -> param('name');
        //Requestde 的instance对象下有多种获取数据的方法
        //param（）获取所有请求方式的数据 等价input('param.')
        //get()路径？后的数据
        //post()post方式的数据
        //route()在路径测试的数据的值
        //在方法中不指定变量名，获取数组对象的数据
        //


        $all = $request->param();
        //最后这个读取数据的方法，使用了依赖注入。需要自己在后续编程中慢慢体会
        print_r($all);
    }
}
