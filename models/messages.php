<?php
namespace models;

  class Messages {
	private $db;
	private $map=[
  'id'=>\PDO::PARAM_INT,
  'question'=>\PDO::PARAM_STR,
  'answer'=>\PDO::PARAM_STR,
  'users_id'=>\PDO::PARAM_INT,
  'consultant_id'=>\PDO::PARAM_INT,
  'factory_id'=>\PDO::PARAM_INT,
  'data_start'=>\PDO::PARAM_INT,
  'data_end'=>\PDO::PARAM_INT,
  'date_update'=>\PDO::PARAM_INT,
  'status_id'=>\PDO::PARAM_INT,
	];
	  
    public function __construct() {
	 $this->db = \libs\Database::getInstance();
   }

public function ssp_messages($param){
	   
	$table = '`messages` AS ms LEFT JOIN `consultant` as c ON ms.consultant_id = c.id ';
	$table .= 'LEFT JOIN `users__` as u ON ms.users_id = u.id ';
	$table .= 'LEFT JOIN `status` as s ON ms.status_id = s.id ';
	
	$primaryKey = 'ms.id';
	
   
	$columns = array(
        array( 'db' => 'ms.id',           'dt' => 'id' ),
        array( 'db' => 'ms.users_id',              'dt' => 'users_id' ),
		array( 'db' => 'u.name as user_name',              'dt' => 'user_name' ),
		array( 'db' => 'ms.question',              'dt' => 'question' ),
        array( 'db' => 'ms.answer',             'dt' => 'answer' ),
        array( 'db' => 'ms.date_update',              'dt' => 'date_update'),
		array( 'db' => 'ms.status_id',              'dt' => 'status_id'),
		array( 'db' => 's.name as status',              'dt' => 'status'),
		array( 'db' => 'c.id as consultant_id',              'dt' => 'consultant_id'),
		array( 'db' => 'c.name as consultant',              'dt' => 'consultant'),
		
	);


	//return ["data"=>[]];exit;
	
	return \libs\ssp::complex( $param, $table, $primaryKey, $columns );
}

public function add($param,$userdata){
	$param = json_decode($param['data'],true);
		
	$must_be = [
	 'question'=>'question=:question',
	 'consultant_id'=>'consultant_id=:consultant_id',
	 'status_id'=>'status_id=:status_id',
	];
	if(Func::must_be($param,$must_be)) return Func::message(null,"Не заполнены поля");	

	$set = $must_be;



	$set_use = [
	  'users_id'=>$userdata['uid'],
	  'factory_id'=>$userdata['factory_id'],
	  'data_start'=>time(),
	  'date_update'=>time(),
	];
	

   $sth = $this->db->prepare("INSERT INTO messages(".implode(", ",array_keys($set)).", ".implode(", ",array_keys($set_use)).") VALUES(:".implode(", :",array_keys($set)).", :".implode(", :",array_keys($set_use)).")");

   print_r($sth); exit;
   
   	foreach ($set as $k=>$v)
	$sth->bindParam(":$k",...[$param[$k],$this->map[$k]]);
	
   	foreach ($set_use as $k=>$v)
	$sth->bindParam(":$k",...[$v,$this->map[$k]]);
	$sth->execute();
	   
	$id = $this->db->lastinsertId();
   	
	return array_merge(Func::message(true,"Запись добавлена"),['id'=>$id]);	

}		 
	
public function change($param,$userdata){
	$param = json_decode($param['data'],true);
	
	if(Func::must_be($param,['id'=>\PDO::PARAM_INT])) return Func::message(null,"Не заполнены поля 1");			
	
	$must_be = [
	 'question'=>'question=:question',
	 'consultant_id'=>'consultant_id=:consultant_id',
	 'status_id'=>'status_id=:status_id',
	];
	if(Func::must_be($param,$must_be)) return Func::message(null,"Не заполнены поля 2");	

	$set = $must_be;
	

   $sth = $this->db->prepare("UPDATE messages SET ".implode(", ",array_values($set)).", date_update=:date_update WHERE id=:id");

	$sth->bindParam(":id",...[$param['id'],\PDO::PARAM_INT]);
	$sth->bindParam(":date_update",...[time(),\PDO::PARAM_INT]);
	
   
   	foreach ($set as $k=>$v)
	$sth->bindParam(":$k",...[$param[$k],$this->map[$k]]);

	$sth->execute();
   	
	return array_merge(Func::message(true,"Запись изменена"));	

	
}	


public function del($param,$userdata){
	
	$param = json_decode($param['data'],true);
	$must_be = [
	   'id'=>\PDO::PARAM_INT
	];
	if(Func::must_be($param,$must_be)) return Func::message(null,"Не выбран");	
   //удалить сможет тот кто создал
   $sth = $this->db->prepare("DELETE FROM messages WHERE id=:id AND users_id=:users_id");
    $sth->bindParam(':users_id',...[$userdata['uid'],\PDO::PARAM_INT]);
   $sth->bindParam(':id',...[$param['id'],\PDO::PARAM_INT]);
   $sth->execute();	 

   return Func::message(true,"Запись удалена");		
	
	
}

  }