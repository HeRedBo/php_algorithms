<?php 
### 队列的链表实现

# 创建链式队列时，需定义两个结构，一个用于描述节点，一个用于描述队列。



/**
 * php用链表实现队列:先进先出FIFO
    1. isEmpty(): 判断队列是否为空
    2. enqueue(): 入队，在队尾加入数据。
    3. dequeue(): 出队，返回并移除队首数据。队空不可出队。
    4. clear(): 清空队列
    5. show(): 显示队列中的元素
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
// 队列类
class Queue
{
    private $header;        // 头节点

    function __construct($data)
    {
        $this->header = new Node($data);
    }

    /**
     * 判断队列是否为空
     *
     * @return boolean
     */
    public function isEmpty()
    {
        if ($this->header && $this->header->next !== null) { // 不为空
            return false;
        }
        return true;
    }

    /**
     * 入队，在队尾加入数据。
     *
     * @param mixed $element
     * @return void
     */
    public function enqueue($element)
    {
        $newNode = new Node($element);
        $current = $this->header;
        if ($current->next == null) 
        { // 只有头节点
            $this->header->next = $newNode;
        } else { // 遍历到队尾最后一个元素
            while ($current->next != null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $newNode->next = null;
    }

    /**
     * 出队，返回并移除队首数据。队空不可出队。
     *
     * @return void
     */
    public function dequeue()
    {
        if ($this->isEmpty()) 
        { // 队列为空
            return false;
        }
        // header头节点没有实际意义，队首节点是header指向的结点。
        $current = $this->header;
        $current->next = $current->next->next;
    }

    // 清空队列
    public function clear()
    {
        $this->header = null;
    }

    // 显示队列中的元素
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
$q = new Queue('header');
$q->enqueue('a');
$q->enqueue('b');
$q->enqueue('c');
echo "队列为：";
$q->show();
echo "</br>";
echo "a出队，队列为：";
$q->dequeue();
$q->show();
echo "</br>";
$q->clear();
echo "清空队列后，队列为";
$q->show();

