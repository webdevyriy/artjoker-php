<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


function debug($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}