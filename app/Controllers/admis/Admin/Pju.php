<?php


namespace App\Controllers\Admin;

use App\Models\ModelIdPel;
use App\Models\ModelTId;
use Config\Services;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Reader;
class Pju extends AdminController
{
    function idpelanggan(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
//        $footerdata['jenis']=$jenisss;

        echo view('admin/template/header', $menu);

        echo view('admin/idpelanggan');
        echo view('admin/template/footer');
    }
    function import(){

        $file = $this->request->getFile('excelimport');
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excelimport']['name']) && $_FILES['excelimport']['type']) {
//            $arr_file = $file->getClientExtension();
            $extension = $file->getClientExtension();
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['excelimport']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            echo "<pre>";
////            var_dump($sheetData);
//                    foreach ($sheetData as $idx=> $data) {
//                        if ($idx==0){
//                            continue;
//                        }
//                        echo $idx.$data[0];
//        }

//        if($file){
//            $excelReader  = new PHPExcel();
//            //mengambil lokasi temp file
//            $fileLocation = $file->getTempName();
//            //baca file
//            $objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
//            //ambil sheet active
//            $sheet	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//            //looping untuk mengambil data
            foreach ($sheetData as $idx=> $data) {
                //skip index 1 karena title excel
                if($idx==0){
                    continue;
                }
                $data=[
                'tglpdl'=> date('Y-m-d',strtotime($data[1])),
                'tgl_nyala'=> date('Y-m-d',strtotime($data[2])),
                'idpel'=> $data[3],
                'nama'=> $data[4],
                'id_tarif'=> $data[5],
                'daya'=> $data[6],
                'lokasi'=> $data[7],
                'tgl_pasang'=> date('Y-m-d',strtotime($data[8])),
                'merk'=> $data[9],
                'type'=> $data[10],
                'no_meter'=> $data[11],
                'subkogol'=> $data[12],
                'kdgardu'=> $data[13],
                'no_tiang'=> $data[14]
                    ];
                $this->db->table('idpel_terpasang')->insert($data);

            }
        }
        echo "Import Berhasil";
    }
//    function detail($idpel=null){
//        if (empty($_SESSION['logedinBNA'])){
//            return redirect()->to(base_url('admin/auth'));
//        }
////        $data['tagiha']
//        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
////      $footerdata['jenis']=$jenis;
//
//        echo view('admin/template/header', $menu);
//
//        echo view('admin/detail');
//        echo view('admin/template/footer');
//    }
    function importtagihan(){

        $file = $this->request->getFile('excelimport');
        $bulan = $this->request->getPost('bulan');
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excelimport']['name']) && $_FILES['excelimport']['type']) {
//            $arr_file = $file->getClientExtension();
            $extension = $file->getClientExtension();
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['excelimport']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            echo "<pre>";
            foreach ($sheetData as $idx=> $data) {
                //skip index 1 karena title excel
                if($idx==11){
                    continue;
                }
                if(!empty($data[4]) && !empty($data[5])){

                    $data=[
                        'id_pel'=> $data[4],
                        'tarip'=> $data[5],
                        'daya'=> $data[6],
                        'blth'=> date('Y-m-d', strtotime($bulan)),
                        'kwh'=> str_replace(',', '', $data[8]),
                        'rpptl'=> str_replace(',', '', $data[9]),
                        'angs'=> $data[10],
                        'tagihan_pln'=> str_replace(',', '', $data[11]),
                        'materai'=> str_replace(',', '',$data[12]),
                        'total_pembayaran'=> str_replace(',', '', $data[13]),
                    ];
                    $this->db->table('tagihan')->insert($data);
                }
            }
        }
        echo "Import Berhasil";
    }

    function getruas(){
        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('ruas_jalan');

        $query = $builder->like('nama_ruas', $this->request->getVar('q'))
            ->select('id, nama_ruas as text')
            ->limit(10)->get();
        $data = $query->getResult();

        echo json_encode($data);
    }
    function savesurvey(){
        $lam = $this->request->getFile('fotolokasi');
//            echo ;
        $namafilebaru = $lam->getRandomName();

        $lam->move(ROOTPATH . '/uploads/perlengkapan', $namafilebaru);

        $keb=$this->request->getPost('fkeb');
        $tipejalan	=$this->request->getPost('tipejalan');
        $ruasjalan	=$this->request->getPost('ruasjalan');
        $lat=$this->request->getPost('lat');
        $lng=$this->request->getPost('lng');
        $posisi=$this->request->getPost('posisi');
        $kebutuhan=$this->request->getPost('kebutuhan');
        $catudaya=$this->request->getPost('catudaya');
        $jenissumber=$this->request->getPost('sumber');
        $dayasolar=$this->request->getPost('dayasolar');
        $charger=$this->request->getPost('charger');
        $baterai=$this->request->getPost('baterai');
        $cap=$this->request->getPost('cap');
        $ltersuplai=$this->request->getPost('ltrsuplai');
        $idpelanggan=$this->request->getPost('idpelanggan');
        $dayakwh=$this->request->getPost('dayakwh');
        $tglnyalakwh=$this->request->getPost('tglnyalakwh');
        $merkkwh=$this->request->getPost('merkkwh');
        $noseri=$this->request->getPost('noseri');
        $nopalkwh=$this->request->getPost('nopalkwh');
        $idplnnon=$this->request->getPost('idpplnnon');
        $dayanon=$this->request->getPost('dayaon');
        $tglnyalanon=$this->request->getPost('tglnyalanon');
        $nopalnon=$this->request->getPost('nopalnon');
        $jenislampu=$this->request->getPost('jenislampu');
        $dayalampu=$this->request->getPost('dayalampu');

        if ($kebutuhan==1){
            if ($catudaya=='M'){

            }else{

                $cek=$this->db->table('idpel_terpasang')->where('idpel', $idpelanggan)->countAllResults();
                if ($cek==1){
                }else{

                }
                if($ltersuplai=='kwh'){

                }else{

                }
            }
        }else{
            $data=array(
                'id_jenis'=>3,
                'id_ruas'=>$ruasjalan,
                'nama'=>'PJU',
                'status'=>'K',
                'coordinate_lat'=>$lat,
                'coordinate_lng'=>$lng,
                'foto'=>$namafilebaru
            );
            $this->db->table('perlengkapan_jalan')->insert($data);
        }
    }

    function loadidpelanggan(){

        $request = Services::request();
        $m_icd = new ModelIdPel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id;
                $row[] = $list->tglpdl;
                $row[] = $list->tgl_nyala;
                $row[] = $list->idpel;
                $row[] = $list->nama;
                $row[] = $list->id_tarif;
                $row[] = $list->daya;
                $row[] = $list->lokasi;
                $row[] = $list->tgl_pasang;
                $row[] = $list->merk;
                $row[] = $list->type;
                $row[] = $list->no_meter;
                $row[] = $list->subkogol;
                $row[] = $list->kdgardu;
                $row[] = $list->no_tiang;
                $row[] = '<div class="btn-group">
                            <button type="button" class="btn bg-navy">Action</button>
                            <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="' . base_url('wali/siswa/edit/' . $list->id_siswa) . '"><i class="fa fa-edit"></i> Edit</a></li>
                                <li><a href="#"><i class="fa fa-trash"> </i> Hapus</a></li>
                                
                            </ul>
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
    function loadtagihan(){

        $request = Services::request();
        $bln=$this->db->query('SELECT * FROM (SELECT blth as bln FROM tagihan GROUP BY blth) as b order by bln desc')->getRow();

        $m_icd = new ModelTId($request,$bln->bln);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id;
                $row[] = $list->id_pel;
                $row[] = $list->blth;
                $row[] = $list->tarip;
                $row[] = number_format($list->daya);
                $row[] = number_format($list->kwh);
                $row[] = number_format($list->rpptl);
                $row[] = number_format($list->angs);
                $row[] = number_format($list->tagihan_pln);
                $row[] = number_format($list->materai);
                $row[] = number_format($list->total_pembayaran);
                $row[] = '<a href="'.base_url("admin/pju/detailtagihan/".$list->id_pel).'" class="btn btn-primary">Detail</a>';
                $data[] = $row;
            }
            $output = ["draw" => $request->getPost('draw'),
                "recordsTotal" => $m_icd->count_all(),
                "recordsFiltered" => $m_icd->count_filtered(),
                "data" => $data];
            echo json_encode($output);
        }
    }
    function grafik(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $t=$this->db->query("SELECT blth as bulan, sum(total_pembayaran) as totall, sum(IF((daya/1000)*375 <= kwh, total_pembayaran, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, total_pembayaran, 0) ) as kwh FROM `tagihan` GROUP BY blth")->getResult();

        foreach ($t as $item) {
//            echo date('Y-M', strtotime($item->bulan));
            $ts[]=array(
                'bulan'=>date('Y-m', strtotime($item->bulan)),
                'total'=>intval($item->totall),
                'kwh'=>intval($item->kwh),
                'nkwh'=>intval($item->nonkwh),
            );
        }
            echo json_encode($ts);
    }

    function grafik2($idpel=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $t=$this->db->query("SELECT blth as bulan, total_pembayaran as totall FROM `tagihan` WHERE id_pel=$idpel")->getResult();

        foreach ($t as $item) {
//            echo date('Y-M', strtotime($item->bulan));
            $ts[]=array(
                'bulan'=>date('Y-m', strtotime($item->bulan)),
                'total'=>intval($item->totall),
            );
        }
        echo json_encode($ts);
    }
    function pie($id=null){
        if ($id==1){
            $t=$this->db->query("SELECT * FROM (SELECT blth as bulan, count(kwh) as totall, sum(IF(((daya/1000)*375) <= kwh, 1, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, 1, 0) ) as kwh FROM `tagihan`  GROUP BY blth) AS aa  ORDER by aa.bulan DESC")->getRow();
            $array[]=array(
                'label'=>'non kWh',
                'data'=>intval($t->nonkwh),
                'color'=> '#D9534F'
            );
            $array[]=array(
                'label'=>'kWh',
                'data'=>intval($t->kwh),
                'color'=> '#1CAF9A'
            );
            echo json_encode($array);
        }else if ($id==2){
            $t=$this->db->query("SELECT * FROM (SELECT blth as bulan, sum(kwh) as totall, sum(IF(((daya/1000)*375) <= kwh, kwh, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, kwh, 0) ) as kwh FROM `tagihan`  GROUP BY blth) AS aa  ORDER by aa.bulan DESC")->getRow();
            $array[]=array(
                'label'=>'non kWh',
                'data'=>intval($t->nonkwh),
                'color'=> '#D9534F'
            );
            $array[]=array(
                'label'=>'kWh',
                'data'=>intval($t->kwh),
                'color'=> '#1CAF9A'
            );
            echo json_encode($array);
        }else if ($id==3){
            $t=$this->db->query("SELECT * FROM (SELECT blth as bulan, sum(total_pembayaran) as totall, sum(IF(((daya/1000)*375) < kwh, total_pembayaran, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, total_pembayaran, 0) ) as kwh FROM `tagihan`  GROUP BY blth) AS aa  ORDER by aa.bulan DESC")->getRow();
            $array[]=array(
                'label'=>'non kWh',
                'data'=>intval($t->nonkwh),
                'color'=> '#D9534F'
            );
            $array[]=array(
                'label'=>'kWh',
                'data'=>intval($t->kwh),
                'color'=> '#1CAF9A'
            );
            echo json_encode($array);

        }else{

        }
    }
    function getIdpel(){
        $idpel=$this->request->getPost('idpel');

        $t=$this->db->table('idpel_terpasang')->where('idpel', $idpel)->get()->getrow();
        echo json_encode($t);
    }
    function tagihan(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $bln=date('Y-m');
        $data['tagihan']=$this->db->query("SELECT * FROM (SELECT blth as bulan, sum(total_pembayaran) as totall, sum(IF((daya/1000)*375 <= kwh, total_pembayaran, 0) ) as nonkwh, sum(IF((daya/1000)*375 > kwh, total_pembayaran, 0) ) as kwh FROM `tagihan` GROUP BY blth) as blnt WHERE bulan LIKE '$bln%'")->getRow();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
//        $footerdata['jenis']=$jenis;

        echo view('admin/template/header', $menu);

        echo view('admin/tagihan', $data);
        echo view('admin/template/footer');
    }

    function survey(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
//        $footerdata['jenis']=$jenis;

        echo view('admin/template/header', $menu);
        echo view('admin/survey');
        echo view('admin/template/footer');
    }
    function detailtagihan($idpel=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }

        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $data['tagihan']=$this->db->query("SELECT *, total_pembayaran as totall FROM tagihan WHERE id_pel='".$idpel."' AND blth LIKE '".date('Y-m')."%'")->getRow();
        $data['idpel']=$idpel;
        $terpasang=$this->db->table('pju')->where('id_pel', $idpel)->get()->getRow();
//        var_dump($terpasang);
        if(empty($terpasang)){
            $terpasangs= "tidak Terpasang / Belum disurvey";
            $info=null;
        }else{
            $terpasangs= "terpasang";

            echo $terpasang->id_perlengkapan_jalan;
            $info=$this->db->table('perlengkapan_jalan')->join('jenis_perlengkapan', 'perlengkapan_jalan.id_jenis=jenis_perlengkapan.id')->join('ruas_jalan', 'ruas_jalan.id= perlengkapan_jalan.id_ruasjalan', 'inner')->select('*, ruas_jalan.id as id_ruas, jenis_perlengkapan.id as idjenis, jenis_perlengkapan.nama as nama_jenis')->where('perlengkapan_jalan.id', $terpasang->id_perlengkapan_jalan)->get()->getRow();

        }
        $data['info']=$info;
        $data['terpasang']=$terpasangs;
        echo view('admin/template/header', $menu);
        echo view('admin/detail',$data);
        echo view('admin/template/footer');
    }

}