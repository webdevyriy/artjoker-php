<?php

class Triangle  extends Figure{
    protected $a, $b, $c;

    public function __construct(int $a, int $b,  int $c) {
        if(!is_numeric($a) && !is_numeric($b) && !is_numeric($c)){
            throw new Exception('need int');
        }
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;

    }

    public function getPerimeter() {
        return $this->a + $this->b + $this->c;
    }
    public function getArea() {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
}