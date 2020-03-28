<?php 

### 顺序查找排序算法
/**
 * Common search
 *
 * @param  array  $arr
 * @param  mixed  $item
 *
 * @return int
 */
function sequenceQuery(array $arr, $item)
{
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $item) {
            return $i;
        }
    }
    return -1;
}

# 测试：顺序查找

$arr1 = array(9, 15, 34, 76, 25, 5, 47, 55);
 echo sequenceQuery($arr1, 47);//结果为6