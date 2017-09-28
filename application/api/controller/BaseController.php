<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/15
 * Time: 21:30
 */

namespace app\api\controller;

use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenExcption;
use app\lib\exception\TokenException;
use app\api\service\Token as TokenService;
use think\Controller;

class BaseController extends Controller
{
//    需要是用户user或者管理员super才能访问
    protected function needPrimaryScope()
    {
        $scope = TokenService::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope >= ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenExcption();
            }
        } else {
            throw new TokenException([
                'msg' => 'Token无效或已过期'
            ]);
        }
    }

//     只有用户user才能访问
    protected function needExclusiveScope()
    {
        $scope = TokenService::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope == ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenExcption();
            }
        } else {
            throw new TokenException([
                'msg' => 'Token无效或已过期'
            ]);
        }
    }
}