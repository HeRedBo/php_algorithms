<?php  

### 数据结构 循环链表 php实现 
// 节点类
class Node
{
    public $data;   // 节点数据
    public $previous;
    public $next;   // 下一节点

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}
// 循环链表类 循环链表还可以分为单循环链表和双循环链表，这里只实现了单循环链表。
class CircularLinkedList
{
    private $header;    // 头节点

    function __construct($data)
    {
        $this->header = new Node($data);
        $this->header->next = $this->header;
    }
    // 查找节点
    public function find($item)
    {
        $current = $this->header;
        while ($current->data != $item) {
            $current = $current->next;
        }
        return $current;
    }
    // 插入新节点
    public function insert($item, $new)
    {
        $newNode = new Node($new);
        $current = $this->find($item);
        if ($current->next != $this->header) { // 链表中间
            $current->next = $newNode;
            $newNode->next = $current->next;
        } else { // 链表尾端
            $current->next = $newNode;
            $newNode->next = $this->header;
        }
        return true;
    }
    // 删除节点
    public function delete($item)
    {
        $current = $this->header;
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }
        if ($current->next != $this->header) { // 链表中间
            $current->next = $current->next->next;
        } else { // 链表尾端
            $current->next = $this->header;
        }
    }
    // 显示链表中的元素
    public function display()
    {
        $current = $this->header;
        while ($current->next != $this->header) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    }
}

// 测试
$linkedList = new CircularLinkedList('header');
$linkedList->insert('header', 'China');
$linkedList->insert('China', 'USA');
$linkedList->insert('USA', 'England');
$linkedList->insert('England', 'Australia');
echo '链表为：';
$linkedList->display();
echo "</br>";
echo '-----删除节点USA-----';
echo "</br>";
$linkedList->delete('USA');
echo '链表为：';
$linkedList->display();
// 输出：
// 链表为：China USA England Australia
//     ----- 删除节点USA -----
//     链表为：China England Australia 