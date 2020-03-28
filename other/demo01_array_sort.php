<?php 
### 算法题 写一个二维数组排序算法函数，能够具有通用性，可以调用php内置函数。



/**
 * 二维数组排序
 *
 * @param array $arr 排序数据
 * @param mixed  $keys 排序的值
 * @param int $order 排序规则 0 升序 1 降序
 * @return array 返回排序结果
 */
function array_sort($arr, $keys, $order = 0)
{
    if (!is_array($arr)) return false;
    $keysValue = [];
    foreach ($arr as $key => $val) 
    {
        $keysValue[$key] = $val[$keys];
    }
    
    ### 针对以为数组排序 
    if ($order == 0)   ### 按照键值对关联数组进行升序排序：
        asort($keysValue);
    else
        arsort($keysValue); ### 函数对关联数组按照键值进行降序排序。
    reset($keysValue);
    $keySort = [];
    foreach ($keysValue as $key => $vals) 
    {
        $keySort[$key] = $key;
    }
    $newArray = [];
    foreach ($keySort as $key => $val) 
    {
        $newArray[$key] = $arr[$val];
    }
    return $newArray;
}



/**
 * 根据某列对二维数组进行排序
 * @param array $arr 需要排序的数组
 * @param string $row 排序依据列
 * @param  string $type asc 表示正序 desc 模式逆序
 * @return array  返回排序好的数组
 */
function array_sort2($arr, $row, $type = 'asc')
{
    if (!is_array($arr))
        return false;
    $arr_temp = [];
    #将排序依据列作为数组的
    // foreach ($arr as $k => $v) 
    // {
    //     $arr_temp[$v[$row]] = $v;
    // }
    $arr_temp = array_column($arr, null, $row);
    # 按照键名对数组排序， 并保持索引关系
    if ($type == 'asc')
        ksort($arr_temp);
    else if ($type == 'desc')
        krsort($arr_temp);
    else {
    }
    return array_values($arr_temp);
    #return $arr_temp;
}


//测试
$person = [
    ['id' => 2, 'name' => 'zhangsan', 'age' => 23],
    ['id' => 5, 'name' => 'lisi', 'age' => 28],
    ['id' => 3, 'name' => 'apple', 'age' => 17],
];
$result = array_sort2($person, 'name', 'asc');
var_dump($result);