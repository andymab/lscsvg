<?php
namespace controllers;


  class Admin extends \libs\Controller{

	
  
   public function __construct() {
	   parent::__construct();
	   
	  
   }

  public function index() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Панель администратора',
		'page' => 'admin/index',
		]		
	  );
	  $this->show();
  }
  
  
public function show(){
   $this->View->render();
}

#region consultants
public function consultants() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Журнал Подразделений',
		'page' => 'admin/consultants',
		'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
	  $this->show();
  }
  
public function  get_typeheaddepartment(){
	// $spr = new \models\consultant();
	// echo json_encode($spr->get_typeheaddepartment($_GET));	  
	  
  }
  
/* public function ssp_consultants(){
	$spr = new \models\consultant();
	echo json_encode($spr->ssp_consultants($_GET));
  } */
  
public function consultants_change(){
	//   $spr = new \models\consultant();
	//   echo json_encode($spr->change($_POST));
  }
public function consultants_add(){
	//   $spr = new \models\consultant();
	//   echo json_encode($spr->add($_POST));
}  
public function consultants_del(){
	//   $spr = new \models\consultant();
	//   echo json_encode($spr->del($_POST));
}

#end consultants

#region departments
public function departments() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Журнал Подразделений',
		'page' => 'admin/departments',
		'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
	  $this->show();
  }
public function ssp_departments(){
	// $spr = new \models\department();
	// echo json_encode($spr->ssp_departments($_GET));
  }
  
public function departments_change(){
	//   $spr = new \models\department();
	//   echo json_encode($spr->change($_POST));
  }
public function departments_add(){
	//   $spr = new \models\department();
	//   echo json_encode($spr->add($_POST));
}  
public function departments_del(){
	//   $spr = new \models\department();
	//   echo json_encode($spr->del($_POST));
}

#end departments
   
#region factory
public function factorys() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Журнал Предприятий',
		'page' => 'admin/factory',
		'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
	  $this->show();
  }
public function ssp_factory(){
	$spr = new \models\factory();
	echo json_encode($spr->ssp_factory($_GET));
  }
  
public function get_typeheadStatus(){
	$spr = new \models\util();
	echo json_encode($spr->get_status($_GET));	 
 } 
public function factory_change(){
	  $spr = new \models\factory();
	  echo json_encode($spr->change($_POST));
  }
public function factory_add(){
	  $spr = new \models\factory();
	  echo json_encode($spr->add($_POST));
}  
public function factory_del(){
	  $spr = new \models\factory();
	  echo json_encode($spr->del($_POST));
}
#endregion

#region users
  public function users() {
	  $this->View->set_model(
		[
		'data' => '',
		'title' => 'Журнал пользователей',
		'page' => 'admin/users',
		'js'=>["public/js/datatables/jquery.dataTables.min.js","public/js/datatables/dataTables.bootstrap.js","public/js/bootstrap3-typeahead.min.js"],
		'css'=>["public/js/datatables/jquery.dataTables.css","public/js/datatables/dataTables.bootstrap.css"],
		]		
	  );
	  $this->show();
  }
  
  
  public function user_change(){
	  $users = new \models\user();
	  echo json_encode($users->user_change($_POST));
  }
  
  public function user_del(){
	  $users = new \models\user();
	  echo json_encode($users->user_del($_POST));
  }  
  
  public function user_add(){
	  $users = new \models\user();
	  echo json_encode($users->user_add($_POST));
  }   
  
  public function ssp_users(){
	$users = new \models\user();
	echo json_encode($users->ssp_users($_GET));
  }
  
   public function get_typeheadFact(){
	   $factory = new \models\factory();
	   
	   echo json_encode($factory->getThFactory($_GET), JSON_UNESCAPED_UNICODE);
   }
   public function get_typeheadCons(){
	   $factory = new \models\consultant();
	   
	   echo json_encode($factory->getThConsultant($_GET), JSON_UNESCAPED_UNICODE);
   }
   public function get_typeheadDep(){
	   $factory = new \models\department();
	   
	   echo json_encode($factory->getThDepartment($_GET), JSON_UNESCAPED_UNICODE);
   }
  }
  #endregion