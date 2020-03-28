<?php

### 猴子选大王算法
/**
 * 一群猴子排成一圈，按1，2，…，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，
 * 再数到第m只，在把它踢出去…，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。
 * 要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。
 */

// 示例代码

### 解法 1 


/**
 * 猴子选择大王算法 (最终算法)
 * @author Red-Bo
 * @date   2016-09-02
 * @param  int     $n  猴子数量
 * @param  int     $m  出局猴子数字
 * @return int     返回最后的猴子序号
 */
function getLeader($n, $m)
{
    $res = 0;
    for ($i = 2; $i <= $n; $i++) {
        $res = ($res + $m) % $i;
    }
    return $res + 1;
}

/**
 * 猴子选大王算法1
 *
 * @param int $n 猴子总数
 * @param int  $m 步长数值 
 * @return void
 * @author RedBo
 */
function king($n, $m)
{
    $mokeys = range(1, $n);
    $i = 0;
    $k = $n;
    while (count($mokeys) > 1) {
        if (($i + 1) % $m == 0) {
            unset($mokeys[$i]);
        } else {
            array_push($mokeys, $mokeys[$i]);
            unset($mokeys[$i]);
        }
        $i++;
    }
    return current($mokeys);
}

### 测试 
$a = king(5, 2);
$b = getLeader(5,2);
echo $a,'--',$b;
