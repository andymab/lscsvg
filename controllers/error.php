<?php
namespace controllers;

class Error  extends \libs\Controller {
	  public function __construct() {
	   parent::__construct();
  }
   
   public function index() {
	    $this->View->model->css[]='public/css/one-page-wonder.css';
		$this->View->render();
  }
  
  
   
  }
?>