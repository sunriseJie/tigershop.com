<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/15
 * Time: 21:32
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;

class Order extends BaseController
{
    protected $beforeActionList = [
        'needExclusiveScope' => ['only' => 'placeOrder'],
    ];

    public function placeOrder(){
        (new OrderPlace()) ->goCheck();
       $products = input('post.products/a');
       $uid = TokenService::getCurrentUID();
    }
}