<?php

namespace controllers;

use models\Func;
use models\Moex_model;
//file:///C:/Users/andy_/Downloads/iss-api-rus-v14%20(2).pdf
/*
В рамках интерфейса доступны следующие типы информации: 
статические данные о рынках (режимы торгов и их группы, финансовые инструменты и их описание), 
данные для построения графиков («свечей»), 
сделки (анонимно), 
котировки, итоги торгов, 
различные метаданные.
Поддерживаются следующие форматы: XML, CSV, JSON, HTML
http://iss.moex.com/iss/index.xml
содержит блоки markets (рынки), boards (режимы торгов), board_groups (группировка режимов), а запрос рыночных параметров инструментов
online справочник запросов http://iss.moex.com/iss/reference/
*/

class Moex  extends \libs\Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_markets_indicativerates_securities(){
        echo json_encode( Func::message(true,'Запись получена',['query'=>$this->getExchangeRate('iss/statistics/engines/futures/markets/indicativerates/securities.json')]));
    }

    public function getExchangeRate($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://iss.moex.com/'.$url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);
        return $out;
    }
}
