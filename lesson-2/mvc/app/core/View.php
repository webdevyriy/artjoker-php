<?php

namespace app\core;



 class View  {

     public $path;
     public $route;
     public $layout = 'default';

    public  function  __construct($route){
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }


    public function  render($title, $vars = []){
        extract($vars);
        $path = 'app/views/'.$this->path.'.php';
        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layouts/'.$this->layout.'.php';
        }else{
            View::errorCode();
        }
    }

    public static function errorCode(){
        http_response_code(404);
        require 'app/views/error/404.php';
        exit;
    }

}