<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/9
 * Time: 22:23
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['delete_time'];

    public function imgUrl(){
        return $this -> hasOne('Image','id','img_id');
    }

}