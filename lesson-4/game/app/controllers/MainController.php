<?php

namespace app\controllers;

use app\core\Controller;

use app\models\Main;


class MainController extends Controller {

    public function indexAction() {
        $this->view->layout = 'registration';
        $this->view->render('Регистрация');
    }

    public function registrationAction(){

        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($_POST)) {
            $this->model->userAdd($login,$email,$password);
        }

    }

    public function loginAction() {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = $this->model->findUser($login, $password);
        if ($user) {
            $_SESSION['isAuth'] = true;
            $_SESSION['login'] = $user['login'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];

            $response = [
                "message" => "yes",
            ];
            echo json_encode($response);
        } else {
            $response = [
                "message" => "no",
            ];
            echo json_encode($response);
        }
    }

    public function logoutAction()
    {
        session_unset();
        header('Location: /');
        exit;
    }
}