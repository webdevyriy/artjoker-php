<?php

require_once ('class/Figure.php');

class Rectangle extends Figure
{
    private $width;
    private $height;

    public function __construct($width, $height){
        if(!is_numeric($width) && !is_numeric($height)){
            throw new Exception('need int');
        }
        $this->width = $width;
        $this->height = $height;
    }

    public function getPerimeter(){
        return ($this->width + $this->height) * 2;
    }

    public function getArea(){
        return $this->width * $this->height;
    }
}