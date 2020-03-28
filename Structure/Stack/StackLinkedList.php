<?php 

/**
 * php用数组实现栈:后入先出LIFO
    1. isEmpty(): 判断队列是否为空。
    2. push(): 入栈，插入新的栈顶节点
    3. pop(): 出栈，删除栈顶元素
    4. clear(): 清空栈
    5. show(): 遍历栈元素
 */
// 节点类


class Node
{
    public $data;   // 节点数据
    public $next;   // 下一节点

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class Stack
{
    private $header;        // 头节点

    function __construct($data)
    {
        $this->header = new Node($data);
    }

    // 判断栈是否为空
    public function isEmpty()
    {
        if ($this->header  && $this->header->next !== null) { // 不为空
            return false;
        }
        return true;
    }
    // 入栈，插入新的栈顶节点
    public function push($element)
    {
        $newNode = new Node($element);
        $current = $this->header;
        if ($current->next == null) { // 只有头节点
            $this->header->next = $newNode;
        } else { // 遍历到栈尾最后一个元素
            while ($current->next != null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $newNode->next = null;
    }

    // 出栈，删除栈顶元素
    public function pop()
    {
        if ($this->isEmpty()) { // 栈为空
            return false;
        }
        $current = $this->header;
        while ($current->next->next != null) {
            $current = $current->next;
        }
        $current->next = null;
    }
    // 清空栈
    public function clear()
    {
        $this->header = null;
    }
    // 显示栈中的元素
    public function show()
    {
        $current = $this->header;
        if ($this->isEmpty()) {
            echo "空！";
        }
        while ($current  && $current->next != null) {
            echo $current->next->data . PHP_EOL;
            $current = $current->next;
        }
    }
}
// 测试
$s = new Stack('header');
$s->push('a');
$s->push('b');
$s->push('c');
echo "栈为：";
$s->show();
echo "</br>";
$s->pop();
echo "出栈，弹出c，栈为：";
$s->show();
echo "</br>";
echo "清空栈，栈为：";
$s->clear();
$s->show();