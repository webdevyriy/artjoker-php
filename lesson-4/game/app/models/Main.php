<?php


namespace app\models;

use app\core\Model;

class Main extends Model
{

    public function userAdd($login, $email, $password){

        $sql = "SELECT * FROM users WHERE login = '$login'";

        $result = $this->db->queryExecute($sql);

        $rowCount = $result->fetchColumn();

        if ($rowCount) {
            $response = [
                "message" => "have-user",
            ];
            echo json_encode($response);
            die();

        } else{
            $sql = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";

            $this->db->queryExecute($sql);

            $response = [
                "message" => "log-in",
            ];

            echo json_encode($response);

        }

    }

    public function findUser($login, $password)
    {
        $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = $this->db->queryExecute($sql);

        $resultArr = call_user_func_array('array_merge', $result->fetchAll(\PDO::FETCH_ASSOC));

        if($resultArr){
            return $resultArr;
        }

    }
}