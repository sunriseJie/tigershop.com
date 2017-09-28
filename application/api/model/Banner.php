<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/15
 * Time: 22:48
 */

namespace app\api\model;


use think\Model;

class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function items(){
        return $this -> hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id)
    {
        return self::with(['items','items.img'])->find($id);
    }
}