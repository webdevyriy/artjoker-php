<?php

namespace app\controllers;

use app\core\Controller;

class GameController extends Controller
{

    public function indexAction()
    {
        $history = $this->model->historyUserGame($_SESSION['id']);

        $this->view->layout = 'game';

        $vars = [
            'login' => $_SESSION['login'],
            'id' => $_SESSION['id'],
            'history' => $history
        ];

        $this->view->render('Крестики нолики', $vars);
    }
    public function resultAction(){

        $input = file_get_contents('php://input');
        $input = json_decode($input);
        $result = filter_var($input->result);

        $this->model->resultGame($result, $_SESSION['id']);

        $history = $this->model->historyUserGame($_SESSION['id']);

        echo json_encode($history);

    }
}