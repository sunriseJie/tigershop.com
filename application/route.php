<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
// 

//使用动态注册路由，这里定义了之后PathInfo模式会失效。
use think\Route;


//建立路由格式
//'路由表达式','路由路径','请求类型(全大写)','路数参数（数组）','变量规格(数组)'
// Route::rule('hello/:id','api/V1/hello');
//路由表达式跟url访问路径的关系
//http://mynet/路由名称/路由名称变量值？方法变量1=方法变量1值&方法变量2=方法变量2值&...
//如果在路由表达式注册的时候注册了变量，对应的方法必须带变量。
//但对应方法带的变量不必一定要再路由注册变量
//GET,POST,DELETE,* 快速注册路由方法 get(),post(),delete(),any()
//Route::get('hello','api/V1/hello');
//
//

//获取banner
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
//获取主题列表
Route::get('api/:version/theme', 'api/:version.theme/getSimpleList');
//获取主题信息
Route::get('api/:version/theme/:id', 'api/:version.theme/getComplexOne', [], ['id' => '\d+']);

Route::group('api/:version/product', function () {
//    获取产品详情
    Route::get('/:id', 'api/:version.product/getProductDetail', [], ['id' => '\d+']);
//获取最新产品
    Route::get('/recent', 'api/:version.product/getRecent');
//获取某个分类下的产品
    Route::get('/by_category/:id', 'api/:version.product/getAllInCategory');

});

//获取分类列表
Route::get('api/:version/category', 'api/:version.category/getAllCategory');
//post  code 获取token
Route::post('api/:version/token/user', 'api/:version.Token/getToken');


//用户信息收货地址
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

Route::group('api/:version/order', function () {
//
    Route::post('', 'api/:version.order/placeOrder');
//获取最新产品
    Route::get('/:id', 'api/:version.order/getOrder', [], ['id' => '\d+']);

});