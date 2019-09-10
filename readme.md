# 接口文档  

## 请求方式
(基础查询)  
 //分类模块  
 $data = M::get('category')->info(2);  
 
 $data = M::get('category')->finalChildren(1);  
 
 $data = M::get('category')->children(1);  
 
 $data = M::get('category')->brothers(1);  
 
 $data = M::get('category')->breadcrumbs(12);  
 
 $data = M::get('category')->search('电脑');  
 
（组合连接查询 注：单次请求多个方法 -- 分类模块方法不适用此方法，其他所有模块均支持）  
$data = M::get('custom')->filter('basis')   

 //教程模块    
 ->info('info', 'course', 1)   
 
 ->lists('lists', 'course', 9, 0, 0, 1)  
  
 ->search('search', 'course', '1')   
 
 //热门教程模块  
 ->hotList('hotList', 'hot')   
 
 //章节模块  
 ->info('chapter_info', 'chapter', 1)   
 
 ->info('chapter_lists', 'chapter', 1, 1)    
 
 //小节模块  
 ->info('subpart_info', 'subpart', 1)   
 
 ->lists('subpart_lists', 'subpart', 1) 
   
 ->parentInfo('subpart_parent', 'subpart', 1)  
  
 //配置模块  
 ->info('setting_info', 'setting', 1)  
 
 ->getList(2);   
 
 （组合查询 注：单次请求多个参数）  
$data = M::get('course')->lists([9,12]);  

## 字段过滤
过滤分3中情况 默认 info  （具体配置详见api 配置文件filter字段）
1. info （查询所有）  
2. basis （少部分主要字段）  
3. advance(除了详情部分其他字段)  
类如 M::get('custom')->filter('basis')  

## Category 分类模块  （category）
### ```all() ```  
获取分类信息    
参数:  

| 参数名 | 描述 | 必填 | 默认 |
| ------ | ---- | ---- | ---- |
| | | | |

### ```info($classid) ```  
获取单条分类信息  
参数:  

 | 参数名 | 描述 | 必填 | 默认 |  
 | ------ | ---- | ---- | ---- |  
 | classid | 分类id | 是 | |  
 
### ```finalChildern ($classid, $limit = 0) ```  
获取classid最终子集  
参数:  

| 参数名 | 描述 | 必填 | 默认 |
| ------ | ---- | ---- | ---- |  
| classid | 分类id | 是 | |
| limit   |  分页条数 | 否 | |

### ```children（$classid, $limit = 0）```  
获取某分类的下级分类  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | classid | 分类id | 是 | |
  | limit   |  分页条数 | 否 | 0 |
  
### ```brothers（$classid）```  
兄弟节点（包含自己）  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | classid | 分类id | 是 | |
  
### ```breadcrumbs（$classid）```  
获取面包屑  
参数:  
    
   | 参数名 | 描述 | 必填 | 默认 |
   | ------ | ---- | ---- | ---- |  
   | classid | 分类id | 是 | |
   
### ```search（$name, $classid = 0）```  
分类下模糊查询分类名  
参数:  
    
   | 参数名 | 描述 | 必填 | 默认 |
   | ------ | ---- | ---- | ---- | 
   | name   | 分类名 | 必填 | | 
   | classid | 分类id | 否 | 0  |
    
## Course 教程模块 (course)
order  排序

  | 可选值 | 描述 |  
  | ------ | --- |
  | updtime | 修改时间升序 |
  | updtimedesc | 倒序 |
  | cretime | 新增时间升序 |
  | cretimedesc | 新增时间倒序 |
  | index  | 首页排序升序 |
  | indexdesc  | 首页排序倒序 |
  | quality  | 精品排序 升序 |
  | qualitydesc  | 精品排序 倒序 |
  | all  | 总点击 升序 |
  | alldesc | 总点击 倒序 |
  | day  | 日点击 升序 |
  | daydesc  | 日点击 倒序 |
  | month | 月点击 升序 |
  | monthdesc  | 月点击 倒序 |
        

### ```info($id,  $is_chapter = 1)  ```  
通过教程id获取 教程信息  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 教程id | 是 | |
  | is_chapter | 是否拼接章节 | 否 | 1 |
  
### ```lists ($classid = 0, $is_chapter = 0, $limit = 0, $order = 'updtimedesc') ```  
通过classid获取教程 （$is_chapter 是否需要拼接章节）   
参数:  
    
   | 参数名 | 描述 | 必填 | 默认 |
   | ------ | ---- | ---- | ---- |  
   | classid | 分类id | 是 | |
   | is_chapter | 是否拼接章节 | 否 | 0 |
   | limit | 条数 | 否 | 0 |
   | order | 排序 | 否 | updtimedesc |
   
### ```qualityList ($classid = 0, $is_chapter = 0, $limit = 0, $order = 'quality') ```  
通过classid获取精品教程 （$is_chapter 是否需要拼接章节）   
参数:  
   
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | classid | 分类id | 是 | |
  | is_chapter | 是否拼接章节 | 否 | 0 |
  | limit | 条数 | 否 | 0 |
  | order | 排序 | 否 | quality |
  
### ```indexList ($classid = 0, $is_chapter = 0, $limit = 0, $order = 'index') ```  
通过classid获取首页教程 （$is_chapter 是否需要拼接章节）   
参数:  
   
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | classid | 分类id | 是 | |
  | is_chapter | 是否拼接章节 | 否 | 0 |
  | limit | 条数 | 否 | 0 |
  | order | 排序 | 否 | index |
  
### ```search($str = '', $limit = 0, $order = 'updtimedesc') ```  
通过字符串获取教程列表  
参数:  
      
   | 参数名 | 描述 | 必填 | 默认 |
   | ------ | ---- | ---- | ---- | 
   | str   | 教程名 | 必填 | | 
   | limit | 条目 | 否 | 0 |
   | order | 排序 | 否 | updtimedesc |

### ```relevanceInfo($id = 0 , $model = 'class') ```  
通过教程id获取关联模型信息 
参数:  
    
 | 参数名 | 描述 | 必填 | 默认 |
 | ------ | ---- | ---- | ---- | 
 | id   | 教程id | 必填 | | 
 | model | 关联模型 | 否 | class |

## Hot热门教程 （hot）
### ```hotList($limit = 0, $order = 'sort') ```  
热门教程  
参数:  
      
   | 参数名 | 描述 | 必填 | 默认 |
   | ------ | ---- | ---- | ---- | 
   | str   | 教程名 | 必填 | | 
   | limit | 条目 | 否 | 0 |
   | order | 排序 | 否 | updtimedesc |

## Chapter 章节模块 （chapter）
order  排序

  | 可选值  | 描述 |  
  | ------  | --- |
  | updtime | 修改时间升序 |
  | updtimedesc | 修改时间倒序 |
  | cretime | 新增时间升序 |
  | cretimedesc  | 新增时间倒序 |
  | sort| 排序 升序 |
  | sortdesc  | 排序 倒序 |
  
### ```info($id = 0, $is_subpart = 0)  ```  
通过章节id获取章节信息(通过参数可拼接小节)  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 章节id | 是 | |
  | is_subpart | 是否拼接小节 | 否 | 0 |
  
### ```lists($id = 0, $is_subpart = 0, $order = 'sort', $limit = 20)  ```  
通过教程id获取章节列表(通过参数可拼接小节)  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 教程id | 是 | |
  | is_subpart | 是否拼接小节 | 否 | 0 |
  | order | 排序 | 否 | updtimedesc |
  | limit | 条数 | 否 | 0 | 
  
### ```relevanceInfo($id = 0 , $model = 'class') ```  
通过章节id获取关联模型信息 
参数:  
    
 | 参数名 | 描述 | 必填 | 默认 |
 | ------ | ---- | ---- | ---- | 
 | id   | 教程id | 必填 | | 
 | model | 关联模型 | 否 | class |
 
  
## Subpart 小节模块
order  排序

  | 可选值  | 描述 |  
  | ------ |  --- |
  | updtime | 修改时间升序 |
  | updtimedesc | 修改时间倒序 |
  | cretime  | 新增时间升序 |
  | cretimedesc | 新增时间倒序 |
  | all | 总点击 升序 |
  | alldesc  | 总点击 倒序 |
  | day | 日点击 升序 |
  | daydesc | 日点击 倒序 |
  | month | 月点击 升序 |
  | monthdesc  | 月点击 倒序 |
  | sort | 排序 升序 |
  | sortdesc | 排序 倒序 |


### ```info($id = 0)   ```  
通过小节id获取小节信息  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 小节id | 是 | |
  
  
### ```lists($id = 0, $order ='sort', $limit = 0)```  
通过章节id获取小节列表  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 章节id | 是 | |
  | order | 排序 | 否 | updtimedesc |
  | limit | 条数 | 否 | 0 | 
  
  
### ```parentInfo($id = 0)```  
通过小节id返回教程+章+节  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 小节id | 是 | |
 
### ```subpartList($id = 0, $order ='sort', $limit = 0)```  
通过教程id获取小节列表  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | id | 教程id | 是 | |
  | order | 排序 | 否 | updtimedesc |
  | limit | 条数 | 否 | 0 | 
  
### ```relevanceInfo($id = 0 , $model = 'class') ```  
通过小节id获取关联模型信息 
参数:  
    
 | 参数名 | 描述 | 必填 | 默认 |
 | ------ | ---- | ---- | ---- | 
 | id   | 小节id | 必填 | | 
 | model | 关联模型 | 否 | class |
 
## Setting 配置模块  （setting）
### ```info($key)   ```  
通过key获取配置信息  
参数:  
  
  | 参数名 | 描述 | 必填 | 默认 |
  | ------ | ---- | ---- | ---- |  
  | key | 配置key | 是 | |
