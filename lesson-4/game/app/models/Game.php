<?php


namespace app\models;

use app\core\Model;

class Game extends Model
{

    public function resultGame($result, $id){

        if($result == 'wins'){
            $sql = "UPDATE users SET users.wins = users.wins+1 where Id='$id'";
            $this->db->queryExecute($sql);
        }else if($result == 'lose'){
            $sql = "UPDATE users SET users.lose = users.lose+1 where Id='$id'";
            $this->db->queryExecute($sql);
        }

    }

   public function historyUserGame($id){
       $resultDb = $this->db->query("SELECT wins, lose FROM users where id ='$id'");
       return call_user_func_array('array_merge', $resultDb);
   }


}