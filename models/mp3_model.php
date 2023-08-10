<?php
namespace models;

 
 class Mp3_model extends \libs\Model {
 public $db;  
 public $events_map = [
  'id_mp3'=>\PDO::PARAM_INT,
  'uid'=>\PDO::PARAM_INT,
  'restime'=>\PDO::PARAM_INT,
  'v1'=>\PDO::PARAM_STR,
  'v2'=>\PDO::PARAM_STR,
  'v3'=>\PDO::PARAM_STR,
  'v4'=>\PDO::PARAM_STR,
  'v5'=>\PDO::PARAM_STR,
  'v6'=>\PDO::PARAM_STR,
];
  
  public function __construct() {
	parent::__construct();
	$this->db = \libs\Database::getInstance();
  }
public function load_kontrs(){
	$sth = $this->db->prepare('Select * From mp3 ORDER BY restime DESC');
	$sth->execute();
	$res = $sth->fetchall();
	foreach($res as $k=>$v){
		$res[$k]->descr = json_decode($v->descr);
	}
	return Func::message(true,'Данные получены',$res);
	
}
public function getLastUid($param){
  	$sth = $this->db->prepare('Select name From users__ WHERE id=:id');
	$sth->bindParam(':id',...[$param['id'], \PDO::PARAM_INT]);
	$sth->execute();
	if($sth->RowCount() == 0) return Func::message(false,'Заись не найдена',['uname'=>' - ']);
		
  return Func::message(true,'Запись получена',['uname'=>$sth->fetch()->name]);
}   
public function add_kontr($param,$uid){
	$must_be = [
		'name'=>\PDO::PARAM_STR,
	];
	if(Func::must_be($param,$must_be)) return Func::message(false,'Недостаточно данных');
		
	$sth = $this->db->prepare('Select id From mp3 WHERE name=:name');
	$sth->bindParam('name',...[$param['name'], \PDO::PARAM_STR]);
	$sth->execute();
	if($sth->RowCount()>0) return Func::message(false,'Имя не уникально');
	
	$sth = $this->db->prepare('INSERT INTO mp3(name,cod,restime,descr,user_id) VALUES(:name,:cod,:restime,:descr,:user_id)');
	$sth->bindParam(':name',...[$param['name'], \PDO::PARAM_STR]);
	$sth->bindParam(':cod',...[$param['cod'], \PDO::PARAM_INT]);
	$sth->bindParam(':restime',...[time(), \PDO::PARAM_INT]);
	$sth->bindParam(':descr',...[json_encode($param['descr'],JSON_UNESCAPED_UNICODE), \PDO::PARAM_STR]);
	$sth->bindParam(':user_id',...[$uid, \PDO::PARAM_INT]);
	$sth->execute();
	
	return Func::message(true,'Запись добавлена',['id'=>$this->db->LastInsertId(),'user_id'=>$uid]);
}  


 
public function change_kontr($param,$uid){
	if(!isset($param['data'])) return Func::message(false,'Недостаточно данных');
	$param = $param['data'];
	if(!isset($param['name'])) return Func::message(false,'Недостаточно данных');
	
	if(!$param['id']) return $this->add_kontr($param,$uid);
	
	$sth = $this->db->prepare('Select name From mp3 WHERE id=:id');
	$sth->bindParam(':id',...[$param['id'], \PDO::PARAM_INT]);
	$sth->execute();
	if($sth->RowCount() == 0) return Func::message(false,'Заись не найдена');
	$name = $sth->fetch()->name;
	
	if($name != $param['name']){
		$sth = $this->db->prepare('Select id From mp3 WHERE name=:name');
		$sth->bindParam('name',...[$param['name'], \PDO::PARAM_STR]);
		$sth->execute();
		if($sth->RowCount()>0) return Func::message(false,'Имя не уникально');
	}
	
	$sth = $this->db->prepare('UPDATE mp3 SET name=:name, cod=:cod, restime=:restime, descr=:descr,user_id=:user_id WHERE id=:id');
	$sth->bindParam(':id',...[$param['id'], \PDO::PARAM_INT]);
	$sth->bindParam(':name',...[$param['name'], \PDO::PARAM_STR]);
	$sth->bindParam(':cod',...[$param['cod'], \PDO::PARAM_INT]);
	$sth->bindParam(':restime',...[time(), \PDO::PARAM_INT]);
	$sth->bindParam(':descr',...[json_encode($param['descr'],JSON_UNESCAPED_UNICODE), \PDO::PARAM_STR]);
	$sth->bindParam(':user_id',...[$uid, \PDO::PARAM_INT]);

	$sth->execute();

	return Func::message(true,'Запись изменена',['id'=>$param['id'],'user_id'=>$uid]);
}
  
  
public function addevents($param,$uid){
	$sth = $this->db->prepare('INSERT INTO mp3__events('.implode(', ',array_keys($this->events_map)).') VALUES(:'.implode(', :',array_keys($this->events_map)).')');

	
	$map = array_keys($this->events_map);
	foreach($map as $key){
		$sth->bindParam(":$key",...[' - ', \PDO::PARAM_STR]);
	}
	$sth->bindParam(':uid',...[$uid, \PDO::PARAM_INT]);
	$sth->bindParam(':restime',...[time(), \PDO::PARAM_INT]);
	$sth->bindParam(':id_mp3',...[$param['id_mp3'], \PDO::PARAM_INT]);	
	
	$sth->execute();
	
	return Func::message(true,'Запись добавлена',['id'=>$this->db->LastInsertId(),'uid'=>$uid]);
}

public function load_events($param){
	if(!isset($param['id_mp3']) || !$param['id_mp3']) return Func::message(false,'Недостаточно данных');	
	$sth = $this->db->prepare('Select * From mp3__events WHERE id_mp3=:id_mp3');
	$sth->bindParam(':id_mp3',...[$param['id_mp3'], \PDO::PARAM_INT]);	
	$sth->execute();
	return Func::message(true,'Данные получены',$sth->fetchall());
}

public function change_events($param,$uid){
	if(!isset($param['name'])) return Func::message(false,'Недостаточно данных');	
	$name = $param['name'];
	if(!array_key_exists($name,$this->events_map)) return Func::message(false,'Ключа не существует');	
	
	if(!isset($param['data'])) return Func::message(false,'Недостаточно данных');
	$param = $param['data'];

	
	$sth = $this->db->prepare('UPDATE mp3__events SET '.$name.'=:name,uid=:uid,restime=:restime WHERE id=:id');
	$sth->bindParam(':id',...[$param['id'], \PDO::PARAM_INT]);
	$sth->bindParam(':uid',...[$uid, \PDO::PARAM_INT]);
	$sth->bindParam(':restime',...[time(), \PDO::PARAM_INT]);
	
	
	$sth->bindParam(':name',...[$param[$name], \PDO::PARAM_STR]);

	$sth->execute();

	return Func::message(true,'Запись изменена',[]);
}
/////E N D  
  }