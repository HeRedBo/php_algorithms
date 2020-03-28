<?php   

### 面试题目： 使对象可以像数组一样进行foreach 循环 要求属性必须是私有。 (Itertator模式的php5 实现 写一类实现Iterator 接口) (腾讯)

class ObjectArray implements Iterator
{
    private $item = [
        'id' => 1,
        'name' => 'php',
        'student_count' => 50
    ];

    public function rewind()
    {
        reset($this->item);
    }

    public function current()
    {
        return current($this->item);
    }

    public function key()
    {
        return key($this->item);
    }

    public function next()
    {
        return next($this->item);
    }

    public function valid()
    {
        return ($this->current() !== false);
    }
}

### 代码调试
$t = new ObjectArray;
foreach ($t as $k => $v) {
    echo $k, ' => ', $v, '<br/>';
}

