<?php

namespace SuperView\Dal\Api;

/**
* Content Dal.
*/
class Content extends Base
{
    /**
     * 排序因子枚举
     */
     protected $orderKeys = [
        'updtime', 'updtimedesc', 'cretime', 'cretimedesc', 'index', 'indexdesc', 'quality', 'qualitydesc',
        'all', 'alldesc', 'day', 'daydesc', 'month', 'monthdesc'
    ];
    protected $hotKeys = [
        'updtime', 'updtimedesc', 'cretime', 'cretimedesc', 'sort', 'sortdesc'
    ];
    /**
     * 通过教程id获取教程内容详情
     *
     * @param int $id 教程id
     * @return array|bool|mixed
     */
    public function getInfo($id = 0, $is_chapter = 1)
    {
        if (intval($id) <= 0) {
            return false;
        }
        $params = [
            'id' => intval($id),
            'is_chapter' => $is_chapter
        ];

        return $this->getData('info', $params);
    }

    /**
     * 通过classid获取教程列表
     *
     * @param int $classid
     * @param int $limit
     * @param int $page
     * @param string $order
     * @return array|bool|mixed
     */
    public function getListByClass($classid = 0, $is_chapter = 0, $limit = 0, $page = 0,  $order = 'updtimedesc')
    {

        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }
        $params = [
            'classid' => $classid,
            'limit' => $limit,
            'order' => $order,
            'page' => $page,
            'is_chapter' => $is_chapter
        ];

        return $this->getData('lists', $params);
    }

    /**
     *  通过classid获取精品教程
     *
     * @param int $classid
     * @param int $limit
     * @param int $page
     * @param string $order
     * @return array|bool|mixed
     */
    public function getQualityListByClass($classid = 0, $is_chapter = 0, $limit = 0, $page = 0,  $order = 'quality')
    {

        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }
        $params = [
            'classid' => $classid,
            'limit' => $limit,
            'order' => $order,
            'page' => $page,
            'is_chapter' => $is_chapter
        ];

        return $this->getData('qualityList', $params);
    }

    /**
     * 通过classid获取首页教程
     *
     * @param int $classid
     * @param int $limit
     * @param int $page
     * @param string $order
     * @return array|bool|mixed
     */
    public function getIndexListByClass($classid = 0, $is_chapter = 0, $limit = 0, $page = 0,  $order = 'index')
    {

        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }
        $params = [
            'classid' => $classid,
            'limit' => $limit,
            'order' => $order,
            'page' => $page,
            'is_chapter' => $is_chapter
        ];

        return $this->getData('indexList', $params);
    }

    /**
     * 模糊查询教程名
     *
     * @param string $str
     * @param int $page
     * @param int $limit
     * @param string $order
     * @return array|bool|mixed
     */
    public function getListByKeyword($str ='', $page = 0, $limit = 0, $order = 'updtimedesc')
    {
        if (empty($str)) {
            return false;
        }
        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }

        $params = [
            'str' => $str,
            'limit' => $limit,
            'order' => $order,
            'page' => $page
        ];

        return $this->getData('search', $params);
    }

    /**
     * 热门教程
     *
     * @param int $limit
     * @param int $page
     * @param string $order
     * @return array|bool|mixed
     */
    public function getListByHot($limit = 0, $page = 0, $order = 'sort')
    {
        if (!$this->isValidOrder($order, $this->hotKeys)) {
            return false;
        }

        $params = [
            'limit' => $limit,
            'order' => $order,
            'page' => $page
        ];
        return $this->getData('hotList', $params);
    }

    /**
     *  通过教程id获取关联模型信息
     *
     * @param int $id
     * @param string $model
     * @return array|bool|mixed
     */
    public function getRelevanceInfo($id = 0, $model = 'class')
    {
        if (intval($id) <= 0) {
            return false;
        }
        $params = [
            'id' => intval($id),
            'model' => $model
        ];

        return $this->getData('relevanceInfo', $params);
    }

}
