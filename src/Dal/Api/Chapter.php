<?php

namespace SuperView\Dal\Api;

/**
* Content Dal.
*/
class Chapter extends Base
{

    /**
     * 排序因子枚举
     */
    private $orderKeys = [
        'updtime', 'updtimedesc', 'cretime', 'cretimedesc', 'sort', 'sortdesc'
    ];

    /**
     * 通过教程id 返回章节列表(通过参数可拼接小节)
     *
     * @param int $id
     * @param int $is_subpart 是否需要拼接小节
     * @param int $page
     * @param int $limit
     * @param string $order
     * @return array|bool|mixed
     */
    public function getListByClass($id = 0, $is_subpart = 0, $page = 0, $limit = 0, $order = 'sort')
    {

        if (!$this->isValidOrder($order, $this->orderKeys)) {
            return false;
        }

        $params = [
            'id' => $id,
            'is_subpart'  => $is_subpart,
            'limit' => $limit,
            'order' => $order,
            'page' => $page
        ];

        return $this->getData('lists', $params);
    }

    /**
     * 通过章节id获取章节信息（通过参数可拼接小节）
     *
     * @param int $id
     * @param int $is_subpart  是否需要拼接小节
     * @return array|bool|mixed
     */
    public function getInfo($id = 0, $is_subpart = 0)
    {
        if (intval($id) <= 0) {
            return false;
        }
        $params = [
            'id' => intval($id),
            'is_subpart' => $is_subpart
        ];

        return $this->getData('info', $params);
    }

    /**
     *  通过章节id获取关联模型信息
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
