<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/25
 * Time: 14:18
 */

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    public function getUrlAttr($value,$data){
        return $this -> prefixImgUrl($value,$data);
    }
}