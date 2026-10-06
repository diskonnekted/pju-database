<?php


namespace App\Controllers;


class Pengaduan extends BaseController
{
    function index(){
        $jenis= $this->db->table("jenis_perlengkapan")->get()->getResult();
        $data['jenis']=$jenis;
        echo view('template/header', $data);
        echo view('pengaduan');
        echo view('template/footer');
    }
    function input(){

    }
}