<?php


namespace App\Controllers;


class Dashboard extends BaseController
{

    public function index(){

        $jenis= $this->db->table("jenis_perlengkapan")->where('sub', null)->get()->getResult();
        $jenis2= $this->db->table("jenis_perlengkapan")->select(
            'jenis_perlengkapan.*, count(perlengkapan_jalan.id) as ptotal')->join('perlengkapan_jalan', 'jenis_perlengkapan.id=perlengkapan_jalan.id_jenis', 'left')->where('jenis_perlengkapan.sub', null)->groupBy('jenis_perlengkapan.id')->get()->getResult();
        $data['jenis']=$jenis;
        $data2['jenis']=$jenis2;
        echo view('new/template/header',$data);
        echo view('new/dashboard',$data2);
//        echo view('template/header',$data);
//        echo view('dashboard',$data2);
//        echo view('template/footer');
    }
}