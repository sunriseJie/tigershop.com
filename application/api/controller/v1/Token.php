<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/28
 * Time: 14:54
 */

namespace app\api\controller\v1;

use app\api\service\UserToken as TokenService;
use app\api\service\UserToken;
use app\api\validate\CodeValidate;
use app\lib\exception\TokenMissException;

class Token
{
    public function getToken($code){
        (new CodeValidate()) ->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();
         return [
             'token' => $token
         ];
    }
}