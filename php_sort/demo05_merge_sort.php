<?php

// 归并排序是建立在归并操作上的一种有效的排序算法。
// 归并排序将待排序的序列分成若干组，保证每组都有序，然后再进行合并排序，最终使整个序列有序。
// 该算法是采用分治法的一个非常典型的应用。
### 原理图可看该文章 ： 
## https://www.cnblogs.com/sunshineliulu/p/8573991.html

// 算法步骤：

//     1、申请空间，使其大小为两个已经排序序列之和，该空间用来存放合并后的序列；
//     2、设定两个指针，最初位置分别为两个已经排序序列的起始位置
//     3、比较两个指针所指向的元素，选择相对小的元素放入到合并空间，并移动指针到下一位置
//     4、重复步骤3直到某一指针达到序列尾
//     5、将另一序列剩下的所有元素直接复制到合并序列尾


/**
 * 归并排序
 *
 * @param array $lists
 * @return array
 */
function merge_sort(array $lists)
{
    $n = count($lists);
    if ($n <= 1) {
        return $lists;
    }
    $left  = merge_sort(array_slice($lists, 0, floor($n / 2)));
    $right = merge_sort(array_slice($lists, floor($n / 2)));
    $lists = merge($left, $right);
    return $lists;
}
function merge(array $left, array $right)
{
    $lists = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $lists[] = $left[$i];
            $i++;
        } else {
            $lists[] = $right[$j];
            $j++;
        }
    }
    $lists = array_merge($lists, array_slice($left, $i));
    $lists = array_merge($lists, array_slice($right, $j));
    return $lists;
}


###  归并排序 递归方式处理







var_dump(merge_sort([4, 7, 6, 3, 9, 5, 8]));

