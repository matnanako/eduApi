<?php

namespace SuperView\Dal\Api;

/**
* Category Dal.
*/
class Category extends Base
{
    /**
     * 分类树
     *
     * @return array|bool|mixed
     */
    public function getList()
    {
        $categories = $this->getData('lists');
        // 生成分类树结构
        $this->makeTrees($categories);
        return $categories;
    }

    /**
     * 生成树
     *
     * @param $categories
     */
    private function makeTrees(&$categories)
    {
        foreach ($categories as $key => $category) {
            $parentId = $category['pid'];
            if ($parentId != 0 && isset($categories[$parentId])) {
                $categories[$parentId]['children'][] =& $categories[$key];
            }
        }
    }

}
