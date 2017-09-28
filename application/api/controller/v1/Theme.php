<?php
/**
 * Created by PhpStorm.
 * User: mavis
 * Date: 2017/7/26
 * Time: 11:34
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollectionMustBeInt;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeMissException;

class Theme
{
    /**
     * @url /theme?ids=id1,id2,id3...
     * @return 一组theme
     * @throws 没有找到theme
     * @throws
     */
    public function getSimpleList($ids = '')
    {
        (new IDCollectionMustBeInt())->goCheck();
        $ids = explode(',', $ids);
        $themes = ThemeModel::with(['topicImg', 'headImg'])
            ->select($ids);
        if ($themes->isEmpty()) {
            throw new ThemeMissException();
        }
        return $themes;
    }

    /**
     * @param string $id url: theme/:id
     * @return array|false|\PDOStatement|string|\think\Model
     * @throws ThemeMissException
     */
    public function getComplexOne($id = '')
    {
        (new IDMustBePositiveInt())->goCheck();

        $theme = ThemeModel::getThemeWithProducts($id);
        if (!$theme) {
            throw new ThemeMissException();
        }
        return $theme;
    }
}