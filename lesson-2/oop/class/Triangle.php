<?php

class Triangle  implements Figure{
    protected $sideOne, $sideTwo, $sideThree;

    public function __construct(int $sideOne, int $sideTwo,  int $sideThree) {

        $this->sideOne = $sideOne;
        $this->sideTwo = $sideTwo;
        $this->sideThree = $sideThree;

    }

    public function getPerimeter() {
        return $this->sideOne + $this->sideTwo + $this->sideThree;
    }
    public function getArea() {
        $area = ($this->sideOne + $this->sideTwo + $this->sideThree) / 2;
        return sqrt($area * ($area - $this->sideOne) * ($area - $this->sideTwo) * ($area - $this->sideThree));
    }
}