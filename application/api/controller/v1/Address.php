<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/12
 * Time: 21:38
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\AddressValidate;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\api\validate\TokenValidate;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenExcption;
use app\lib\exception\ScopeException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;


class Address extends BaseController
{
    protected $beforeActionList = [
        'needPrimaryScope' => ['only' => 'createOrUpdateAddress'],
    ];



    public function createOrUpdateAddress()
    {
        $addressValidate = new AddressValidate();
        $addressValidate->goCheck();
//        (new TokenValidate())->goCheck();
        (new TokenValidate())->goCheck();
        $uid = TokenService::getCurrentUID();

        $user = UserModel::get($uid);
        if (!$user) {
            throw new UserException();
        }
        $dataArray = $addressValidate->getDataByRule(input('post.'));
        $UserAddress = $user->address;

        if (!$UserAddress) {
            //crete new
            $user->address()->save($dataArray);
        } else {
            //update
            $user->address->save($dataArray);
        }

//        throw new SuccessMessage();
        //上面的方式是我自己写的，下面是教程
        return json(new SuccessMessage(), 201);
    }
}