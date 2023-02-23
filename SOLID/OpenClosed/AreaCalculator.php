<?php

namespace SOLID\OpenClosed;

/**
 * Class AreaCalculator
 *
 * @package SOLID\OpenClosed
 *
 * Objects or entities should be open for extension but closed for modification.
 */
class AreaCalculator
{
    protected IShape $shapes;

    public function __construct($shapes = [])
    {
        $this->shapes = $shapes;
    }

    public function sum(): int
    {
        $area = [];

        foreach($this->shapes as $shape) {
            $area[] = $shape->getArea();
        }

        /* When add new type of shape you need to modify this method
        foreach($this->shapes as $shape) {
            if($shape instanceof Square) {
                $area[] = pow($shape->length, 2);
            } else if($shape instanceof Rectangle) {
                $area[] = $shape->width * $shape->height;
            }
        } */

        return array_sum($area);
    }
}