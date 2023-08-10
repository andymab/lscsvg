<?php
namespace models;

use libs\Database;

class Moex_model extends \libs\Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::getInstance();
    }

    public function get(){
        $sth = $this->db->prepare('Select name From users__ WHERE id=:id');
        $sth->bindParam(':id',...[$param['id'], \PDO::PARAM_INT]);
        $sth->execute();
        if($sth->RowCount() == 0) return Func::message(false,'Заись не найдена',['uname'=>' - ']);
        return Func::message(true,'Запись получена',['uname'=>$sth->fetch()->name]);
    }

  
}