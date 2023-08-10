<?php
namespace controllers;

class Index extends \libs\Controller{
  public $model;
  
  

   public function __construct() {
	   parent::__construct();
		 $this->index();
   }
   
public function index() {
	//$this->View->model->page = 'mp3/index'; //'index/index';
    	$this->View->set_model(
		[
		// 'contentEditable' => sizeof(array_intersect(['admin','mp3'],$this->View->model->userdata['urole'])) ? ' contenteditable="true" ' : '',
		'contentEditable' => '',
		'title' => 'Маршрут 3',
		'page' => 'mp3/index',
        'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
      

	$this->View->render();
  }
 

  }
?>