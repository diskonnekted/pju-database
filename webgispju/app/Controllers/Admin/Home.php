<?php
namespace App\Controllers\Admin;

class Home extends AdminController
{
  function index(){
      if (empty($_SESSION['logedinBNA'])){
          return redirect()->to(base_url('admin/auth'));
      }
      $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
      echo view('admin/template/header', $menu);

      echo view('admin/dashboard');
      echo view('admin/template/footer');
  }
}