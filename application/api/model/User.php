<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/28
 * Time: 15:06
 */

namespace app\api\model;


class User extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function address(){
        return $this->hasOne('UserAddress','user_id','id');
    }

    public static function getByOpenId($openid)
    {
        $user = self::where('openid','=',$openid) ->find();
        return $user;
    }

    public static function getByUID($uid){
        $user = self::where('uid','=',$uid) ->find();
        return $user;
    }
}