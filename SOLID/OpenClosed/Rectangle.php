<?php

namespace SOLID\OpenClosed;

class Rectangle implements IShape
{
    private $_width;
    private $_height;

    public function __construct(int $width, int $height)
    {
        $this->_width = $width;
        $this->_height = $height;
    }

    public function getArea(): int
    {
        return $this->_width * $this->_height;
    }
}