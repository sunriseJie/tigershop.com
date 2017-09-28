<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/27
 * Time: 14:42
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductMissException;
use think\Controller;

class Product extends Controller
{

    public function getRecent($count = 15)
    {
        (new Count())->goCheck();

        $products = ProductModel::getMostRecent($count);
        if (!$products) {
            throw new ProductMissException();
        }
        $collection = collection($products);
        $products = $collection->hidden(['summary', 'img_id']);
        return $products;
    }

    public function getAllInCategory($id = ''){
        (new IDMustBePositiveInt()) ->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if(!$products){
            throw new ProductMissException();
        }
        $collection = collection($products);
        $products = $collection->hidden(['summary','img_id','from']);
        return $products;
    }

    public function getProductDetail($id='')
    {
        (new IDMustBePositiveInt())->goCheck();

        $product = ProductModel::getProductOne($id);
        if(!$product){
            throw new ProductMissException();
        }
        return $product;
    }
}