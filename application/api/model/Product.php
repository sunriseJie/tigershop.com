<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/26
 * Time: 11:28
 */

namespace app\api\model;


use app\api\validate\IDMustBePositiveInt;

class Product extends BaseModel
{
    public $hidden = ['delete_time', 'create_time', 'update_time', 'pivot'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time', 'desc')
            ->select();

        return $products;
    }

    public static function getProductsByCategoryID($categoryID)
    {
        $products = self::where('category_id', '=', $categoryID)
            ->select();
        return $products;
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');

    }

    public static function getProductOne($id)
    {
        $product = self::where('id', '=', $id)
            ->with(['imgs' => function ($query) {
                $query -> with(['imgUrl'])
                    ->order('order','asc');
            }])
            ->with(['properties'])
            ->select();
        return $product;
    }
}