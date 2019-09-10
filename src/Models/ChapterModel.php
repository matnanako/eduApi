<?php

namespace SuperView\Models;

/**
 * 章节模块
 *
 * Class ChapterModel
 * @package SuperView\Models
 */
class ChapterModel extends BaseModel
{
    /**
     *通过教程id获取章节列表(通过参数可拼接小节)
     *
     * @param int|array $id    教程id
     * @param int $is_subpart  是否需要拼接小节
     * @param string $order
     * @param int $limit
     * @return array
     */
    public function lists($id = 0, $is_subpart = 0, $order = 'sort', $limit = 20)
    {
        $page = $this->getCurrentPage();
        $data = $this->dal['chapter']->getListByClass($id, $is_subpart, $page, $limit, $order);
        return $this->returnWithPage($data, $limit);

    }

    /**
     * 通过章节id获取章节信息(通过参数可拼接小节)
     *
     * @param int $id
     * @param int $is_subpart 是否需要拼接小节
     * @return mixed
     */
    public function info($id = 0, $is_subpart = 0)
    {
        $data = $this->dal['chapter']->getInfo($id, $is_subpart);
        return $data;
    }

    /**
     *  通过章节id获取关联模型信息
     *
     * @param int $id
     * @param string $model
     * @return mixed
     */
    public function relevanceInfo($id = 0, $model = 'class')
    {
        $data = $this->dal['chapter']->getRelevanceInfo($id, $model);
        return $data;
    }
}
