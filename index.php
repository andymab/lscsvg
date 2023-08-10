<?php

require 'config/define.php';

spl_autoload_register(function ($name) {
	$name = ltrim($name, "\\");
	$name = str_replace("\\", "/", $name);
	$filepath = $name . '.php';
	if (file_exists(__DIR__ . '/' . $filepath))  require_once __DIR__ . '/' . $filepath;
	else {
		if (isset($controller->View->model->page)) { //если работает представление
			$controller = new \controllers\error();
			$controller->View->set_model(
				[
					'page' => 'error/404',
					'message' => 'Ваш класс говно -> ' . $name,
				]
			);
			$controller->index();
			exit;
		}
	}
});

$app = new \controllers\routs;
$app->rout();
