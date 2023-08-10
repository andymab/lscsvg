<?php

namespace libs;

class Controller
{
	public $View;
	// public $Session;
	// public $Access;

	public function __construct()
	{
		$this->View = new View();
		// $this->Session = new Session();
		// if (isset($_POST['quit'])) {
		// 	$this->Session->uid = null;
		// 	$this->Session->destroy();
		// }
		//$this->Access = new Access();
		// $this->View->model->userdata  = $this->Access->setSession($this->Session->uid, $this->Session->sid);
		// if (isset($_POST['login'])) {
		// 	$this->View->model->userdata  = $this->Access->getUserRole($_POST);
		// }
	}
}
