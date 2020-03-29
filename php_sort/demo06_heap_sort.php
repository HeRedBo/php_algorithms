<?php 

// 堆排序是指利用堆这种数据结构所设计的一种排序算法。

// 堆积是一个近似完全二叉树的结构，并同时满足堆积的性质：即子结点的键值或索引总是小于（或者大于）它的父节点。

/**
 * 堆排序
 *
 * @param array $lists
 * @return array
 */
function heap_sort(array $lists)
{
    $n = count($lists);
    build_heap($lists);
    while (--$n) {
        $val = $lists[0];
        $lists[0] = $lists[$n];
        $lists[$n] = $val;
        heap_adjust($lists, 0, $n);
        //echo "sort: " . $n . "\t" . implode(', ', $lists) . PHP_EOL;
    }
    return $lists;
}

function build_heap(array &$lists)
{
    $n = count($lists) - 1;
    for ($i = floor(($n - 1) / 2); $i >= 0; $i--) {
        heap_adjust($lists, $i, $n + 1);
        //echo "build: " . $i . "\t" . implode(', ', $lists) . PHP_EOL;
    }
    //echo "build ok: " . implode(', ', $lists) . PHP_EOL;
}

function heap_adjust(array &$lists, $i, $num)
{
    if ($i > $num / 2) {
        return;
    }
    $key = $i;
    $leftChild = $i * 2 + 1;
    $rightChild = $i * 2 + 2;

    if ($leftChild < $num && $lists[$leftChild] > $lists[$key]) {
        $key = $leftChild;
    }
    if ($rightChild < $num && $lists[$rightChild] > $lists[$key]) {
        $key = $rightChild;
    }
    if ($key != $i) {
        $val = $lists[$i];
        $lists[$i] = $lists[$key];
        $lists[$key] = $val;
        heap_adjust($lists, $key, $num);
    }
}

