<?php

namespace controllers;

use models\Moex_model;

class MoexSecurities extends \libs\Controller
{
    //ценные бумаги
    public $model;
    private $formatDocum = ['xml','json','csv','html'];
    private $urlApi = 'http://iss.moex.com/iss/engines/stock/';
    private $http://iss.moex.com/iss/engines/stock/markets/index/securities.xml


    public function __construct()
    {
        parent::__construct();
        $this->index();
    }

    public function index()
    {
        //$this->View->model->page = 'mp3/index'; //'index/index';
        $this->View->set_model(
            [
                // 'contentEditable' => sizeof(array_intersect(['admin','mp3'],$this->View->model->userdata['urole'])) ? ' contenteditable="true" ' : '',
                'contentEditable' => '',
                'title' => 'Московская биржа | Ценные бумаги',
                'page' => 'moex/Securities',
                'js' => ["public/js/datatables/jquery.dataTables.min.js", "public/js/datatables/dataTables.bootstrap.js", "public/js/bootstrap3-typeahead.min.js"],
                'css' => ["public/js/datatables/jquery.dataTables.css", "public/js/datatables/dataTables.bootstrap.css"],
            ]
        );


        $this->View->render();
    }
}
