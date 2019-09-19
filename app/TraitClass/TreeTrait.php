<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\TraitClass;

trait TreeTrait
{
    /**
     * 处理权限分类
     */
    public function tree($list = [], $pk = 'id', $pid = 'parent_id', $child = '_child', $root = 0)
    {

        // 创建Tree
        $tree = [];
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = [];
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            //转出ID对内容
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];

                } else {

                    if (isset($refer[$parentId])) {

                        $parent =& $refer[$parentId];

                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }


}