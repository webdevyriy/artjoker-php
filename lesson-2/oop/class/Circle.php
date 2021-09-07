<?php

class Circle extends Figure{
    private $radius;

    public function __construct(int $radius){
        if(!is_numeric($radius)){
            throw new Exception('need int');
        }
        $this->radius = $radius;
    }

    public function getPerimeter(){
        return 2 * pi() * $this->radius;
    }

    public function getArea(){
        return 2 * pi() * pow($this->radius, 2);
    }
}