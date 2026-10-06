<?php


namespace App\Controllers;


class Dashboard extends BaseController
{

    public function index(){
        

        $jenis= $this->db->table("jenis_perlengkapan")->where('sub', null)->get()->getResult();
        $jenis2= $this->db->table("jenis_perlengkapan")->select(
            'jenis_perlengkapan.*, count(perlengkapan_jalan.id) as ptotal')->join('perlengkapan_jalan', 'jenis_perlengkapan.id=perlengkapan_jalan.id_jenis', 'left')->where('jenis_perlengkapan.sub', null)->groupBy('jenis_perlengkapan.id')->get()->getResult();
            
        $jenis23= $this->db->query("SELECT count(perlengkapan_jalan.id) as ptotal FROM `jenis_perlengkapan` INNER JOIN perlengkapan_jalan on jenis_perlengkapan.id = perlengkapan_jalan.id_jenis where jenis_perlengkapan.sub=4")->getRow();
        
        $data['jenis']=$jenis;
        $data2['r4']=$jenis23->ptotal;
        $data2['jenis']=$jenis2;
        echo view('new/template/header',$data);
        echo view('new/dashboard',$data2);
    }
}