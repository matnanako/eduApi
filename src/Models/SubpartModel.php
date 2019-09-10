<?php

namespace SuperView\Models;

/**
 * 小节模块
 *
 * Class ChapterModel
 * @package SuperView\Models
 */
class SubpartModel extends BaseModel
{
    /**
     * 通过小节id获取小节信息
     *
     * @param int $id
     * @return mixed
     */
    public function info($id = 0)
    {
        $data = $this->dal['subpart']->getInfo($id);
        return $data;
    }

    /**
     * 通过章节id获取小节列表
     *
     * @param int|array $id
     * @param string $order
     * @param int $limit
     * @return array
     */
    public function lists($id = 0, $order ='sort', $limit = 0)
    {
        $page = $this->getCurrentPage();
        $data = $this->dal['subpart']->getListById($id, $order, $limit, $page);
        return $this->returnWithPage($data, $limit);
    }

    /**
     * 通过小节id返回 教程信息+章信息+小节信息
     *
     * @param int $id
     * @return mixed
     */
    public function parentInfo($id = 0)
    {
        $data = $this->dal['subpart']->getParentInfo($id);
        return $data;
    }

    /**
     * 通过教程id获取小节列表
     *
     * @param int $id
     * @param string $order
     * @param int $limit
     * @return array
     */
    public function subpartList($id = 0, $order ='sort', $limit = 0)
    {
        $page = $this->getCurrentPage();
        $data = $this->dal['subpart']->getSubpartList($id, $order, $limit, $page);
        return $this->returnWithPage($data, $limit);
    }

    /**
     *  通过小节id获取关联模型信息
     *
     * @param int $id
     * @param string $model
     * @return mixed
     */
    public function relevanceInfo($id = 0 , $model = 'class')
    {
        $data = $this->dal['subpart']->getRelevanceInfo($id, $model);
        return $data;
    }
}
