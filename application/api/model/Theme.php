<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/26
 * Time: 11:27
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];
    public function topicImg()
    {
//        return $this->belongsTo('Image', 'topic_img_id', 'id');
        return $this -> hasOne('Image','id','topic_img_id');
    }

    public function headImg()
    {
//        return $this->belongsTo('Image', 'head_img_id', 'id');
        return $this -> hasOne('Image','id','head_img_id');
    }

    public function products(){
        return $this -> belongsToMany('Product','theme_product','product_id');
    }

    public static function getThemeWithProducts($id){
        $theme = self::with(['topicImg','headImg','products'])
            -> find($id);
        return $theme;
    }


}