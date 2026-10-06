<?php


namespace App\Controllers;


use App\Models\LoadRuas;
use Config\Services;

class Datajalan extends BaseController
{
    function index(){
        $jenis= $this->db->table("jenis_perlengkapan")->get()->getResult();
        $data['jenis']=$jenis;
        echo view('new/template/header', $data);
        echo view("new/datajalan");
    }
    function getRuas(){
    $jalan=['', 'Nasional', 'Provinsi', 'Kabupaten'];
    $request = Services::request();
    $m_icd = new LoadRuas($request);
    if ($request->getMethod(true) == 'POST') {
        $lists = $m_icd->get_datatables();
        $data = [];
        $no = $request->getPost("start");
//            $WhereAll
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $list->norut;
            $row[] = $list->nomor_ruas;
            $row[] = $jalan[$list->jenis];
            $row[] = $list->nama_ruas;
            $row[] = $list->titik_awal;
            $row[] = $list->titik_akhir;
            $row[] = $list->panjang;
            $row[] = $list->lebar;
            $row[] = $list->kelas;
            $row[] = 'Lat : '.$list->from_lat.'<br>Lng : '.$list->from_lng;
            $row[] = 'Lat : '.$list->to_lat.'<br>Lng : '.$list->to_lng;
            $row[] = '<div class="btn-group">
                            <button type="button" class="btn btn-info">Lihat Peta</button>
                           
                        </div>';
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