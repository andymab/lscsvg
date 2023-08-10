<?php
namespace controllers;

  class Heading extends \libs\Controller{
	
	public function __construct() {
	   parent::__construct();
	   
	  
   }
   
   
public function get_typeheadStatus(){
	$spr = new \models\util();
	echo json_encode($spr->get_status($_GET));	 
 } 
 
public function get_hfactory(){
	$spr = new \models\factory();
	echo json_encode($spr->getThFactory($_GET));	 
}
 
public function get_hconsultant(){
	$spr = new \models\consultant();
	echo json_encode($spr->getThConsultant($_GET));	 
} 
public function get_huser(){
	$spr = new \models\user();
	echo json_encode($spr->getThUser($_GET));	 
}  
  }