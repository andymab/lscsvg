<?php
namespace models;

  class Util {
	private $db;
	  
    public function __construct() {
	 $this->db = \libs\Database::getInstance();
   }

public function get_status($param){
	$must_be = [
	   'profile'=>\PDO::PARAM_STR,
	];
	if(Func::must_be($param,$must_be)) return Func::message(null,"Не заполнены поля");	
	
		$isset_be = [
	   'q'=>\PDO::PARAM_STR,

	];	
	if(Func::isset_be($param,$must_be)) return Func::message(null,"Недостаточно данных");
	
	$sth = $this->db->prepare("SELECT id as status_id, name FROM status WHERE profile=:profile AND name like :name  LIMIT 8");

		$sth->bindParam(":profile", ...[$param['profile'], \PDO::PARAM_STR]);
		$sth->bindParam(":name", ...["%".$param['q']."%", \PDO::PARAM_STR]);
        $sth->execute();
		if(!$sth->RowCount()) return [];
		return $sth->fetchAll();	  
  }
  
  }