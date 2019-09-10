<?php

namespace SuperView\Models;

/**
 * 学院模块  + 热门教程模块
 *
 * Class ContentModel
 * @package SuperView\Models
 */
class ContentModel extends BaseModel
{

    /**
     * 通过教程id获取 教程信息
     */
    public function info($id = 0, $is_chapter = 1)
    {
        $data = $this->dal()->getInfo($id, $is_chapter);
        return $data;
    }

    /**
     * 通过classid获取教程 （同时可用与是否精品，是否首页数据）
     *
     * @param int|array $classid classid
     * @param int $is_quality  是否精品
     * @param int $is_show_home 是否首页
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function lists($classid = 0, $is_chapter = 0, $limit = 0, $order = 'updtimedesc')
    {
        $page = $this->getCurrentPage();
        $data = $this->dal()->getListByClass($classid, $is_chapter, $limit, $page, $order);
        return $this->returnWithPage($data, $limit);
    }

    /**
     * 通过classid获取精品教程 （同时可用与是否精品，是否首页数据）
     *
     * @param int|array $classid classid
     * @param int $is_quality  是否精品
     * @param int $is_show_home 是否首页
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function qualityList($classid = 0, $is_chapter = 0, $limit = 0, $order = 'quality')
    {
        $page = $this->getCurrentPage();
        $data = $this->dal()->getQualityListByClass($classid, $is_chapter, $limit, $page, $order);
        return $this->returnWithPage($data, $limit);
    }

    /**
     * 通过classid获取首页教程 （同时可用与是否精品，是否首页数据）
     *
     * @param int|array $classid classid
     * @param int $is_quality  是否精品
     * @param int $is_show_home 是否首页
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function indexList($classid = 0, $is_chapter = 0, $limit = 0, $order = 'index')
    {
        $page = $this->getCurrentPage();
        $data = $this->dal()->getIndexListByClass($classid, $is_chapter, $limit, $page, $order);
        return $this->returnWithPage($data, $limit);
    }

    /**
     * 通过字符串获取教程列表
     *
     * @param string|array $str
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function search($str = '', $limit = 0, $order = 'updtimedesc')
    {
        $page = $this->getCurrentPage();
        $data = $this->dal()->getListByKeyword($str, $page, $limit, $order);
        return $this->returnWithPage($data, $limit);
    }

    /**
     * 获取dal模型.
     *
     * @return object
     */
    private function dal()
    {
        return $this->dal['content:' . $this->virtualModel];
    }

    /**
     * 热门教程
     *
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function hotList($limit = 0, $order = 'sort')
    {
        $page = $this->getCurrentPage();
        $data = $this->dal['hot']->getListByHot($limit, $page, $order);
        return $this->returnWithPage($data, $limit);
    }

    /**
     *  通过教程id获取关联模型信息
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
