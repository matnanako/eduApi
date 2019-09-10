<?php

namespace SuperView\Dal\Api;

/**
* Content Dal.
*/
class Subpart extends Base
{
    /**
     * 排序因子枚举
     */
    protected $orderKeys = [
        'updtime', 'updtimedesc', 'cretime', 'cretimedesc', 'all', 'alldesc', 'day', 'daydesc',
        'month', 'monthdesc', 'sort', 'sortdesc'
    ];

    /**
     * 通过小节id获取小节信息
     *
     * @param int $id
     * @return array|bool|mixed
     */
    public function getInfo($id = 0)
    {
        if (intval($id) <= 0) {
            return false;
        }
        $params = [
            'id' => intval($id)
        ];

        return $this->getData('info', $params);
    }

    /**
     * 通过章节id获取小节列表
     *
     * @param int $id
     * @param string $order
     * @param int $limit
     * @param int $page
     * @return array|bool|mixed
     */
    public function getListById($id = 0, $order = 'sort', $limit = 0, $page = 1)
    {
        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }
        $params = [
            'id' => $id,
            'limit' => $limit,
            'order' => $order,
            'page' => $page
        ];

        return $this->getData('lists', $params);
    }

    /**
     * 通过小节id返回 教程信息+章信息+小节信息
     *
     * @param $id
     * @return array|bool|mixed
     */
    public function getParentInfo($id)
    {
        if (intval($id) <= 0) {
            return false;
        }
        $params = [
            'id' => intval($id)
        ];

        return $this->getData('parentInfo', $params);
    }

    /**
     * 通过教程id获取小节列表
     *
     * @param int $id
     * @param string $order
     * @param int $limit
     * @param int $page
     * @return array|bool|mixed
     */
    public function getSubpartList($id = 0, $order = 'sort', $limit = 0, $page = 1)
    {
        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }
        $params = [
            'id' => $id,
            'limit' => $limit,
            'order' => $order,
            'page' => $page
        ];

        return $this->getData('subpartList', $params);
    }

    /**
     *  通过小节id获取关联模型信息
     *
     * @param int $id
     * @param string $model
     * @return array|bool|mixed
     */
    public function getRelevanceInfo($id = 0 , $model = 'class')
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
