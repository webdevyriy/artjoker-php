<?php

namespace app\core;
use PDO;
class Db
{
    protected $db;

    public function  __construct(){
        $config =  require_once 'app/config/db.php';
        $this->db = new PDO(
            'mysql:host='.$config['host'].';dbname='.$config['name'].';charset=utf8',
            $config['user'],
            $config['password']
        );

    }

   public function query($sql){
       $query =  $this->db->query($sql);
       $result = $query->fetchAll(PDO::FETCH_ASSOC);
       return $result;
   }


}