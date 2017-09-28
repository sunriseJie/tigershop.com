<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/8/9
 * Time: 22:32
 */

namespace app\api\model;


class ProductProperty extends  BaseModel
{
    public $hidden = ['delete_time', 'update_time'];
}