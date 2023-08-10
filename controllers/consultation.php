<?php
namespace controllers;

  class Consultation extends \libs\Controller{

	public function __construct() {
	parent::__construct();
	   
	  
   }
   
     public function index() {
	 
	  $this->View->set_model(
		[
		'title' => 'Консультации',
		'page' => 'consultation/index',
				'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
	  $this->show();
	  
  }
  
       public function show(){
	   $this->View->render();
   } 
 }