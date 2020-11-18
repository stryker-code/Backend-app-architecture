<?php

namespace SOLID\OpenClosed;

class Square implements IShape
{
    private $_length;

    public function __construct(int $length)
    {
        $this->_length = $length;
    }

    public function getArea()
    {
        return pow($this->_length, 2);
    }
}