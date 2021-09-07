<?php

namespace app\models;

use app\core\Model;

class News extends Model {

    public function getNews() {
		$result = $this->db->query('SELECT title, description, img FROM news');
		return $result;
	}

}
