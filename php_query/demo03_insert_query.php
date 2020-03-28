<?php


/**
 * 插入查询
 * 
 * -------------------------------------------------------------
 * 思路分析：对于数组长度比较大，关键字分布又是比较均匀的来说，插值查找的效率比折半查找的效率高
 * -------------------------------------------------------------
 * 它是二分查找的改进。
 * 在英文词典里查找“apple”，你下意识里翻开词典是翻前面的书页还是后面的书页呢？如果再查“zoo”,你又会怎么查？
 * 显然你不会从词典中间开始查起，而是有一定目的地往前或往后翻。
 */

 // +--------------------------------------------------------------------------
/**
 * insertQuery
 *
 * @param array $container
 * @param       $num
 * @return bool|float|int
 */
function insertQuery(array $arr, $num)
{
    $count = count($arr);
    $lower = 0;
    $high = $count - 1;

    while ($lower <= $high) 
    {
        if ($arr[$lower] == $num) 
        {
            return $lower;
        }
        if ($arr[$high] == $num) {
            return $high;
        }

        $left = intval($lower + $num - $arr[$lower]);
        $right = ($arr[$high] - $arr[$lower]) * ($high - $lower);

        $middle = $left / $right;

        if ($num < $arr[$middle]) {
            $high = $middle - 1;
        } else if ($num > $arr[$middle]) {
            $lower = $middle + 1;
        } else {
            return $middle;
        }
    }
    return -1;
}

// +--------------------------------------------------------------------------
// | 方案测试    | php `this.php` || PHPStorm -> 右键 -> Run `this.php`
// +--------------------------------------------------------------------------

// $arr = range(1, 100);
// echo insertQuery($arr, 10);
//  echo insertQuery([4, 5, 7, 8, 9, 10, 8], 8);
// 6