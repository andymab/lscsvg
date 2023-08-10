<?php

namespace models;

class Func
{

	private $memory;
	private $time;
	private $db;

	public function __construct()
	{
		$this->db = \libs\Database::getInstance();
	}

	static function must_be($p, $mb)
	{
		foreach ($mb as $key => $value) {
			if (!isset($p[$key]) || $p[$key] == false) return true;
		}
	}

	static function isset_be($array, $must)
	{
		foreach ($must as $key => $value) {
			if (!isset($array[$key])) return true;
		}
	}

	static function message($s, $m, $data = null)
	{
		return ['status' => $s ? 'success' : 'error', 'message' => $m ? $m : 'Ошибка', 'data' => $data ? $data : []];
	}



	static function test_start()
	{
		self::$memory = memory_get_usage();
		self::$time = microtime(true);
	}
	static function test_show()
	{
		$time = sprintf('%f секунд <br/>', microtime(true) - self::$time);
		$memory =  number_format(memory_get_usage() - self::$memory, 0, '.', ' ') . ' bytes';
		echo '<pre>' . $time . "\n" . $memory . "</pre>";
	}
}
