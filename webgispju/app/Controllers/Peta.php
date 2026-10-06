<?php


namespace App\Controllers;

use App\Models\HomeModel;
class Peta extends BaseController
{
    function index(){
        $jenis= $this->db->table("jenis_perlengkapan")->get()->getResult();
        $data['jenis']=$jenis;
        echo view('new/template/header', $data);
        echo view("new/maps");
//        echo view("new/template/footer");
//        echo view('template/header', $data);
//        echo view("maps");
//        echo view("template/footer");
    }
    function perlengkapan($perlengkapanid = null, $ruas=null){

        $perlengkapan=$this->db->table('perlengkapan_jalan a')->select('a.*, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'left')->where('a.id_jenis', $perlengkapanid);
        if ($ruas==0){
            $perlengkapans=$perlengkapan->get()->getResult();
        }else{
            $perlengkapans=$perlengkapan->where('a.id_ruasjalan', $ruas)->get()->getResult();
        }
        foreach ($perlengkapans as $item) {
            if ($item->kondisi=='Baik'){
                $t='Baik';
            }else if($item->kondisi=='Rusak'){
                $t='Rusak';
            }else{
                $t='hilang';
            }
            $array[]=['lat'=>$item->coordinate_lat,
                'lng'=>$item->coordinate_lng,
                'type'=>$item->kondisi,
                'name'=>$item->nama,
                'ruas'=>$item->ruas,
                'id'=>$item->id,
                'kondisi'=>$item->kondisi,
                'jenis'=>$item->jenis,
                'icon'=>$item->icon,
                'posisi'=>$item->posisi,
                'keterangan'=>$item->keterangan,
                'gambar'=>$item->foto];
        }
        echo json_encode($array);
    }
    function geoLoc($id){

    }
    function perkap($id=null){
        if ($id==null){
            $id=1;
        }
        $jenis= $this->db->table("jenis_perlengkapan")->get()->getResult();
        $jeniss= $this->db->table("jenis_perlengkapan")->where('id', $id)->get()->getRow();
        $data['jenis']=$jenis;
        $datapeta['jenis']=$jeniss;
        //        $datapeta['perlengkapan']=$this->db->table('perlengkapan_jalan a')->select('a.*, b.nama as jenis, b.icon as markericon')->join('jenis_perlengkapan b', 'b.id=a.id_jenis')->where('a.id_jenis', $id)->get()->getRow();
//        var_dump($datapeta['perlengkapan']);
        echo view('new/template/header', $data);
        echo view('new/perkap', $datapeta);
        echo view('new/template/footer');
    }
    public function getRuas(){
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('ruas_jalan');

        $query = $builder->like('nama_ruas', $this->request->getVar('q'))
            ->select('id, nama_ruas as text')
            ->limit(10)->get();
        $data = $query->getResult();

        echo json_encode($data);
    }
    function detailperkap($id){

    }
    function getJenis(){
        $j=$this->db->table('jenis_perlengkapan')->get()->getResult();
        foreach ($j as $item) {
            $array['results'][]=array('id'=>$item->id, 'text'=>$item->nama);
        }
        echo json_encode($array);
    }
    function getdir($dir=null){
        if (empty($dir)){
            $data=null;
        }else{
            $dir=$this->db->table('ruas_jalan')->where('id', $dir)->get()->getRow();
            $from= $dir->from_lat.', '.$dir->from_lng;
            $to= $dir->to_lat.', '.$dir->to_lng;
            $data=array('from'=>$from, 'to'=>$to);
        }
        echo json_encode($data);
    }
}