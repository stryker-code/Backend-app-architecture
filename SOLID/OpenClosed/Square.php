<?php

namespace SOLID\OpenClosed;

class Square implements IShape
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function getArea() :float
    {
        return (float)pow($this->length, 2);
    }
}
