<?php

namespace controllers;

class Messages extends \libs\Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->View->set_model(
			[
				'title' => 'Сообщения',
				'page' => 'messages/index',

			]
		);
		$this->show();
	}

	public function show()
	{
		$this->View->render();
	}


	public function factory()
	{
		//в дальнейшем здесь включена проверка предприятия 
		//подключить класс и получить данные
		$this->View->set_model(
			[
				'title' => 'Сообщения по предприятию',
				'page' => 'messages/factory',
				'js' => ["public/js/datatables/jquery.dataTables.min.js", "public/js/datatables/dataTables.bootstrap.js", "public/js/bootstrap3-typeahead.min.js"],
				'css' => ["public/js/datatables/jquery.dataTables.css", "public/js/datatables/dataTables.bootstrap.css"],
			]
		);
		$this->show();
	}

	public function ssp_messages()
	{

		$spr = new \models\messages();
		echo json_encode($spr->ssp_messages($_GET));
	}

	public function message_add()
	{
		$spr = new \models\messages();
		echo json_encode($spr->add($_POST, $this->View->model->userdata));
	}

	public function message_change()
	{
		$spr = new \models\messages();
		echo json_encode($spr->change($_POST, $this->View->model->userdata));
	}

	public function message_del()
	{
		$spr = new \models\messages();
		echo json_encode($spr->del($_POST, $this->View->model->userdata));
	}
}
