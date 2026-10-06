<?php
namespace App\Controllers\Admin;

class Home extends AdminController
{
  function index(){
      if (empty($_SESSION['logedinBNA'])){
          return redirect()->to(base_url('admin/auth'));
      }
      if($_SESSION['loginas']!=1){
          
          return redirect()->to(base_url('/admin/pju/survey'));
      }
      $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
//      $data['tagihan']=number_format($this->db->table('tagihan')->select('sum(total_pembayaran) as total')->like('blth', date('Y-m'),'after')->get()->getRow()->total);
      $data['tagihan']=$this->db->query("SELECT * FROM (SELECT blth as bulan, sum(total_pembayaran) as totall, sum(IF((daya/1000)*375 <= kwh, total_pembayaran, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, total_pembayaran, 0) ) as kwh FROM `tagihan` GROUP BY blth) as blnt WHERE bulan LIKE '".date('Y-m')."%'")->getRow();
      $data['idpel']=$this->db->query("SELECT count(a.id_pel) as total_idpel FROM tagihan as a where blth LIKE '".date('Y-m')."%'")->getRow();
      $data['idpell']=$this->db->query("SELECT count(a.idpel) as total_idpel FROM idpel_terpasang as a")->getRow();
      $data['laporan']=$this->db->query("SELECT count(a.id_pengaduan) as tpeng, count(b.belumverif) as bverif From pengaduan a INNER join (SELECT id_pengaduan, IF(status = 0, 1, null) belumverif FROM pengaduan GROUP BY id_pengaduan) as b on a.id_pengaduan = b.id_pengaduan")->getRow();
      $data['jenis']=$this->db->query("SELECT count(id) as tjenis FROM jenis_perlengkapan WHERE sub is NULL")->getRow();
      $data['rusak']=$this->db->query("SELECT count(id) as rusak FROM perlengkapan_jalan WHERE kondisi='Rusak'")->getRow();
      $data['pengaduan']=$this->db->table('pengaduan')->orderBy('tgl_pengaduan', 'DESC')->limit(3)->get()->getResult();
      echo view('admin/template/header', $menu);
      echo view('admin/dashboard', $data);
      echo view('admin/template/footer');
  }
}