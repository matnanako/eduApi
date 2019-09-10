<?php

namespace SuperView\Models;

/**
 * setting模块
 *
 * Class SettingModel
 * @package SuperView\Models
 */
class SettingModel extends BaseModel
{
    /**
     * 通过key获取value
     */
    public function info($key = 0)
    {
        $data = $this->dal['setting']->getInfo($key);
        return $data;
    }
}
