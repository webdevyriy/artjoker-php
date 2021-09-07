<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Db;

class NewsController extends Controller {

    public function showAction() {

        $result = $this->model->getNews();
        $vars = [
            'news' => $result
        ];


        $this->view->render('Новости', $vars);
    }

}