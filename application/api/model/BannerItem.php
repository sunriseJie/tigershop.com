<?php

namespace app\api\model;


class BannerItem extends BaseModel
{
    //
//    protected $hidden = ['id','img_id','delete_time','update_time','banner_id'];
    public function img(){
        return $this -> hasMany('Image','id','img_id');
    }
}
