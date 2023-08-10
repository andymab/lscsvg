<?php
namespace controllers;

  class mp3 extends \libs\Controller{
	   public $model;
      
	public function __construct() {
	parent::__construct();
	   
	  
   }

  public function index() {
	  //$spr = new \models\mp3_model;	

    	$this->View->set_model(
		[
		//'contentEditable' => sizeof(array_intersect(['admin','mp3'],$this->View->model->userdata['urole'])) ? ' contenteditable="true" ' : '',
		'contentEditable' =>  '',
		'title' => 'Маршрут 3',
		'page' => 'mp3/index',
        'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]
		);
		
	  $this->View->render();
  }

  public function change_kontr(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->change_kontr($_POST,$this->View->model->userdata['uid']));
  }
  public function load_kontrs(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->load_kontrs());
  }  
  
  public function getLastUid(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->getLastUid($_POST));	  
  }
  
  public function addevents(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->addevents($_POST,$this->View->model->userdata['uid']));	  
  }   
  
   public function load_events(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->load_events($_POST));	  
  } 

   public function change_events(){
	  $spr = new \models\mp3_model;
	  echo json_encode($spr->change_events($_POST,$this->View->model->userdata['uid']));	  
  } 
  
  
  
///E N D ************************
  }