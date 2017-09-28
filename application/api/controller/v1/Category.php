<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/27
 * Time: 22:13
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryMissException;

class Category
{
    public function getAllCategory()
    {
        $categorys = CategoryModel::all([],'image');
        if(!$categorys){
            throw new CategoryMissException();
        }
        return $categorys;
    }
}