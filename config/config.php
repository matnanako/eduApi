<?php
return [
    'class_url' => '',
    'info_url' => '',

    // Cache lifetime.
    'cache_minutes' => 120,
    // 是否刷新缓存.
    'refresh_cache' => 0,

    // Api service host.
    'api_base_url' => 'http://www.api.com/xueyuan',

    // Models alias map to class.
    'models' => [
        'content' => SuperView\Models\ContentModel::class,
        'category' => SuperView\Models\CategoryModel::class,
        'banner' => SuperView\Models\BannerModel::class,
        'custom' => SuperView\Models\CustomModel::class,
        'chapter' => SuperView\Models\ChapterModel::class,
        'subpart' => SuperView\Models\SubpartModel::class,
        'setting' => SuperView\Models\SettingModel::class,
        'hot' => SuperView\Models\ContentModel::class,
    ],

    'dals' => [
        'content' => SuperView\Dal\Api\Content::class,
        'category' => SuperView\Dal\Api\Category::class,
        'banner' => SuperView\Dal\Api\Banner::class,
        'custom' => SuperView\Dal\Api\Custom::class,
        'hot' => SuperView\Dal\Api\Content::class,
        'chapter' => SuperView\Dal\Api\Chapter::class,
        'subpart' => SuperView\Dal\Api\Subpart::class,
        'setting' => SuperView\Dal\Api\Setting::class
    ],

    'pagination' => [
        'layout' => '',
        'total' => '',
        'previous' => '',
        'links' => '',
        'link_active' => '',
        'next' => '',
        'dots' => '',
    ],

    //新缓存规则部分是使用
    'type' => [
        'category' => ['utils','category'],
        'course' => ['course', 'hot', 'chapter', 'subpart'],
    ],


];