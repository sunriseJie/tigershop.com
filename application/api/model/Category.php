<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/27
 * Time: 22:16
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function image()
    {
//        return $this->belongsTo('image','topic_img_id','id');
        return $this->hasOne('image', 'id', 'topic_img_id');
    }


}