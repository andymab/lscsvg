<?php

namespace libs;

class View
{
	public $model;

	public function __construct()
	{
		$this->model = new \stdClass;
		$this->model->message = '';
		$this->model->full = false;
	}

	public function render()
	{
		$path = 'views/' . $this->model->page . '.php';
		if (!file_exists($path)) {
			$controller = new \controllers\error;
			$this->set_model(
				[
					'page' => "error/404",
					'message' => "Не найдено представление -> " . $path,
				]
			);
			$controller->index();
			return;
		}
		if (!$this->model->full) {
			echo '<!DOCTYPE html>
			<html lang="en">';
			require 'views/head.php';
			echo "<body>";
			require 'views/nav-top.php';
			require $path;
			require 'views/footer.php';
			echo "</body></html>";
		} else{
			require 'views/' . $this->model->page . '.php';
		}
			
	}

	public function set_model($param)
	{
		foreach ($param as $key => $val) {
			$this->model->$key = $val;
		}
	}
}
