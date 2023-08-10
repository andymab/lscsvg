<?php
namespace controllers;

  class Contact extends \libs\Controller{

	
  
   public function __construct() {
	   parent::__construct();
	   
	  
   }

  public function index() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Контакты',
		'page' => 'contact/index',
		]		
	  );
	  $this->show();
  }
  
  
    public function show(){
	   $this->View->render();
   } 
   


  }