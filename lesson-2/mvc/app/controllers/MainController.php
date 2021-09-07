<?php

namespace app\controllers;

use app\core\Controller;

use app\core\Db;

class MainController extends Controller {

    public function indexAction() {
        $vars = [
            'description' => 'Привет мир'
        ];

        $this->view->render('Главная страница', $vars);
    }

}