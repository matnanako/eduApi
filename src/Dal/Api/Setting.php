<?php

namespace SuperView\Dal\Api;

/**
* Content Dal.
*/
class Setting extends Base
{
    /**
     * 通过key获取setting信息
     *
     * @param int $id
     * @return array|bool|mixed
     */
    public function getInfo($key = 0)
    {
        if (!$key) {
            return false;
        }
        $params = [
            'key' => $key
        ];

        return $this->getData('info', $params);
    }


}
