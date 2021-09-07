<?php

abstract class Figure
{

    protected $perimeter;
    protected $area;

    public function getAreaAndPerimeter()
    {
        $this->perimeter = $this->getPerimeter();
        $this->area = $this->getArea();

        $array = [
            ['perimeter' => $this->perimeter],
            ['area' => $this->area],
        ];
        return $array;
    }

    abstract protected function getArea();

    abstract protected function getPerimeter();
}
