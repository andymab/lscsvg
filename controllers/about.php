<?php
namespace controllers;

  class About extends \libs\Controller{

	
  
   public function __construct() {
	   parent::__construct();
	   
	  
   }

  public function index() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'О нас',
		'page' => 'about/index',
		]		
	  );
	  $this->show();
  }

  
   public function show(){
	   $this->View->render();
   } 
   


  }