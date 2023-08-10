<?php

namespace libs;


class Model
{

	public $db;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function __call($name, $arguments)
	{
		// Замечание: значение $name регистрозависимо.
		$type = [
			"boolean",
			"integer",
			"double",
			"string",
			"array",
			"object",
			"resource",
			"NULL"
		];
		$controller = new \controllers\error();
		//print_r(gettype($arguments));
		//	if(gettype($arguments) == "array") $text = "<pre>".json_encode($arguments)."</pre>";


		$controller->View->set_model(
			[
				'page' => 'error/404',
				'message' => 'error Вызов метода -> ' . $name,
			]
		);
		$controller->index();
	}

	/**  Начиная с версии PHP 5.3.0  */
	public static function __callStatic($name, $arguments)
	{
		$controller = new \controllers\error();
		$controller->View->set_model(
			[
				'page' => 'error/404',
				'message' => 'error Вызов статического метода -> ' . $name,

			]
		);
		$controller->index();
	}
}
