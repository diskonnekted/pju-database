<?php


namespace App\Controllers\Admin;


use App\Models\LoadPengaduan;
use App\Models\LoadRuas;
use Config\Services;

class Pengaduan extends AdminController
{
    function index(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $data['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/laporan');
        echo view('admin/template/footer');
    }
    function detail($id=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $data['pengaduan']=$this->db->table('pengaduan')->where('id_pengaduan', $id)->get()->getRow();
        $data['perlengkapan']=$this->db->table('perlengkapan_jalan')->select('*, ruas_jalan.id as id_ruas')->join('ruas_jalan', 'perlengkapan_jalan.id_ruasjalan=ruas_jalan.id')->where('perlengkapan_jalan.id', $data['pengaduan']->id_perlengkapan)->get()->getRow();
        $data['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/detailpengaduan', $data);
        echo view('admin/template/footer');
    }
    function datapengaduan(){
//        echo "as";
        $request = Services::request();
        $m_icd = new LoadPengaduan($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
//            $WhereAll
            foreach ($lists as $list) {
                if ($list->status)
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nik;
                $row[] = $list->nama;
                $row[] = $list->wa;
                $row[] = $list->nama_jenis;
                $row[] = $list->nama_ruas;
                $row[] = $list->tgl_pengaduan;
                $row[] = $list->status_pengaduan;
                $row[] = '<a href="/admin/pengaduan/detail/'.$list->id_pengaduan.'" type="button" class="btn btn-primary">Detail</a>';
                $data[] = $row;
            }
            $output = ["draw" => $request->getPost('draw'),
                "recordsTotal" => $m_icd->count_all(),
                "recordsFiltered" => $m_icd->count_filtered(),
                "data" => $data];
            echo json_encode($output);
        }
    }
}