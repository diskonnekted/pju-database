<?php


namespace App\Controllers;

use App\Models\HomeModel;
class Peta extends BaseController
{
    function index(){
        $jenis= $this->db->table("jenis_perlengkapan")->where('sub', null)  ->get()->getResult();
        $data['jenis']=$jenis;
        echo view('new/template/header', $data);
        echo view("new/maps");
//        echo view("new/template/footer");
//        echo view('template/header', $data);
//        echo view("maps");
//        echo view("template/footer");
    }
    function perlengkapan2($perlengkapanid = null, $ruas=null){

        $perlengkapan=$this->db->table('perlengkapan_jalan a')->select('a.*, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'left');
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
    function perlengkapan($perlengkapanid = 0, $ruas=0){
        error_reporting(0);
        if($perlengkapanid==0){
            if ($ruas==0){
            $perlengkapans=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner')->get()->getResult();
        }else{
            $perlengkapans=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner')->where('a.id_ruasjalan', $ruas)->get()->getResult();
        }
            // $perlengkapan=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner');
        }else{
            if ($ruas==0){
            $perlengkapans=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner')->where('a.id_jenis', $perlengkapanid)->orWhere('b.sub', $perlengkapanid)->get()->getResult();
        }else{
            $perlengkapans=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner')->where('a.id_ruasjalan', $ruas)->where('a.id_jenis', $perlengkapanid)->orWhere('b.sub', $perlengkapanid)->get()->getResult();
        }
            // $perlengkapan=$this->db->table('perlengkapan_jalan a')->select('a.*, b.id as id_jenis, b.sub as subs, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'inner')->where('a.id_jenis', $perlengkapanid)->orWhere('b.sub', $perlengkapanid);
        }
        
        foreach ($perlengkapans as $item) {
            if ($item->kondisi=='Baik'){
                $t='Baik';
            }else if($item->kondisi=='Rusak'){
                $t='Rusak';
            }else{
                $t='hilang';
            }
            if($item->id_jenis == 4 || $item->subs==4){
                $grambu=$this->db->table('gambar_rambu')->where('id_gambar', $item->id_gambar)->get()->getRow();
//                var_dump($grambu);
                if (empty($grambu)){
                    $gambar='/default.png';

                }else{
                    $gambar='/rambu/'.$grambu->gambar_rambu;

                }

            }else{
                if ($item->foto==null){
                    $gambar='default.png';

                }else{
                    $gambar='/perlengkapan/'.$item->foto;

                }

            }
            $array[]=['lat'=>$item->coordinate_lat,
                'lng'=>$item->coordinate_lng,
                'type'=>$item->kondisi,
                'name'=>$item->nama,
                'ruas'=>$item->ruas,
                'id'=>$item->id,
                'kondisi'=>$item->kondisi,
                'jenis'=>$item->jenis,
                'id_jenis'=>$item->id_jenis,
                'sub'=>$item->subs,
                'icon'=>$item->icon,
                'posisi'=>$item->posisi,
                'keterangan'=>$item->keterangan,
                'gambar'=>$gambar];
        }
        echo json_encode($array);
    }
    function geoLoc($id){

    }
    function perkap($id=null){
        if ($id==null){
            $id=1;
        }
        $jenis= $this->db->table("jenis_perlengkapan")->where('sub', null)  ->get()->getResult();
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
    function detailperkap($id=null){
        $perlengkapan=$this->db->table('perlengkapan_jalan')->select("*, perlengkapan_jalan.id as idperl,  jenis_perlengkapan.nama as jenis, jenis_perlengkapan.id as id_jenis")->join('jenis_perlengkapan', 'perlengkapan_jalan.id_jenis=jenis_perlengkapan.id', 'inner')->join('ruas_jalan', 'perlengkapan_jalan.id_ruasjalan=ruas_jalan.id', 'inner')->where('perlengkapan_jalan.id', $id)->get()->getRow();
        $jenis= $this->db->table("jenis_perlengkapan")->where('sub', null)->get()->getResult();
        $laporan=$this->db->table('pengaduan')->where('id_perlengkapan', $id)->where('status','!= 0')->orderBy('id_pengaduan', 'DESC')->get()->getRow();
        $data['jenis']=$jenis;
        $da['perlengkapan']=$perlengkapan;
        $da['laporan']=$laporan;
        echo view('new/template/header', $data);
        echo view("new/detailmaps", $da);
    }
    function dperl($id=null){

        $perlengkapan=$this->db->table('perlengkapan_jalan a')->select('a.*, b.nama as jenis, b.icon as icon, c.nama_ruas as ruas')->join('jenis_perlengkapan b', 'a.id_jenis=b.id', 'inner')->join('ruas_jalan c', 'a.id_ruasjalan=c.id', 'left')->where('a.id', $id);
        $perlengkapans=$perlengkapan->get()->getRow();


            if ($perlengkapans->kondisi=='Baik'){
                $t='Baik';
            }else if($perlengkapans->kondisi=='Rusak'){
                $t='Rusak';
            }else{
                $t='hilang';
            }
            $array=['lat'=>$perlengkapans->coordinate_lat,
                'lng'=>$perlengkapans->coordinate_lng,
                'type'=>$perlengkapans->kondisi,
                'name'=>$perlengkapans->nama,
                'ruas'=>$perlengkapans->ruas,
                'id'=>$perlengkapans->id,
                'kondisi'=>$perlengkapans->kondisi,
                'jenis'=>$perlengkapans->jenis,
                'icon'=>$perlengkapans->icon,
                'posisi'=>$perlengkapans->posisi,
                'keterangan'=>$perlengkapans->keterangan,
                'gambar'=>$perlengkapans->foto];

        echo json_encode($array);
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