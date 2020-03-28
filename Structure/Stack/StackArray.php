<?php

### 栈的数组实现

# 在PHP函数中，array_push函数是向数组尾部添加元素，即入栈操作；array_pop函数是删除数组尾部元素，即出栈操作。
# $array =  array('a', 'b');
# array_push($array, 'c'); //入栈
# array_pop($array);       //出栈

/**
 * php用数组实现栈:后入先出LIFO

    1. getLength(): 获得栈的长度
    2. push(): 入栈，在最顶层加入数据。
    3. pop(): 出栈，返回并移除最顶层的数据。
    4. getTop(): 返回最顶层数据的值，但不移除它
    5. clearStack(): 清空栈
    6. show(): 遍历栈元素
 */

class StackArray {
    // 使用数组实现栈结构
    public $stack = array();

    // 获得栈的长度
    public function getLength() 
    {
        return count($this->stack);
    }

    // 入栈，在最顶层加入数据。
    public function push($element) {
        $this->stack[] = $element;
    }
    // 出栈，返回并移除最顶层的数据。
    public function pop() 
    {
        if ($this->getLength() > 0) {
            return array_pop($this->stack);
        }
    }

    // 返回最顶层数据的值，但不移除它
    public function getTop() 
    {
        $top = $this->getLength() - 1;
        return $this->stack[$top];
    }
    // 清空栈
    public function clearStack() 
    {
        $this->stack = array();
    }
    // 遍历栈元素
    public function show() 
    {
        if ($this->getLength() > 0) {
            for ($i = 0; $i < $this->getLength(); $i++) {
                echo $this->stack[$i] . PHP_EOL;
            }
        }
        else 
        {
            echo "空！";
        }
        
    }
}

// 测试
$s = new StackArray();
$s->push('a');
$s->push('b');
$s->push('c');
echo "栈为：";
$s->show();
echo "</br>";
echo '栈顶元素为' . $s->getTop();
echo "</br>";
echo '栈的长度为：' . $s->getLength();
echo "</br>";
$s->pop();
echo "出栈，弹出c，栈为：";
$s->show();
echo "</br>";
echo "清空栈，栈为：";
$s->clearStack();
$s->show();

### 测试执行结果 ： 
// 栈为：a b c
// 栈顶元素为c
// 栈的长度为：3
// 出栈，弹出c，栈为：a b
// 清空栈，栈为：空！