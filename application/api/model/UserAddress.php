<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/12
 * Time: 23:26
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public static function getAddressbyUID($uid)
    {
        $address = self::where('user_id','=',$uid)
            ->find();
        return $address;
    }
}