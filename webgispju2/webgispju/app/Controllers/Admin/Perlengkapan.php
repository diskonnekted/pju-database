<?php


namespace App\Controllers\Admin;

use App\Models\Load_Perlengkapan;
use Config\Services;

class Perlengkapan extends AdminController
{
    public function index(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
      return  redirect()->to(base_url('admin').'/perlengkapan/data/s1');
    }
    function survey($jenis=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();

        $jenisper['jenis']=$this->db->table('jenis_perlengkapan')->where('sub =', null)->get()->getResult();
        $jenisper['rambu']=$this->db->table('jenis_perlengkapan')->where('sub ', 4)->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/formtambahpj', $jenisper);
        echo view('admin/template/footer');
    }
    function savesurvey($jenis=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        if ($this->request->getMethod() !== 'post') {
//            return redirect()->back();
            echo '2';
        }

        $validated = $this->validate([
            'lampiran' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/gif,image/png]|max_size[lampiran,8192]'
        ]);

        if ($validated == FALSE) {
            echo "123";
            // Kembali ke function index supaya membawa data uploads dan validasi
//            return redirect()->back();

        } else {

            $lam = $this->request->getFile('fotolokasi');
            $lamp = $this->request->getFile('lampiran');
//            echo ;
            $namafilebaru = $lam->getRandomName();
            $namafilebar = $lamp->getRandomName();

            $lam->move(ROOTPATH . '/uploads/perlengkapan', $namafilebaru);
            $lamp->move(ROOTPATH . '/uploads/lampiran', $namafilebar);
            $ruas = $this->request->getPost('ruasjalan');
            $lat = $this->request->getPost('lat');
            $lng = $this->request->getPost('lng');
            $posisi = $this->request->getPost('posisi');
            $jenisperlengkapan = $this->request->getPost('jenisperlengkapan');
            $jenisrambu = $this->request->getPost('jenisrambu');

            $kondisi = $this->request->getPost('kondisi');
            $status = $this->request->getPost('status');
            $keterangan = $this->request->getPost('keterangan');
            if ($jenisrambu==''){
                $j=$jenisperlengkapan;
            }else{
                $j=$jenisrambu;
            }
            $keterangan = $this->request->getPost('keterangan');
            $nama = $this->request->getPost('nama');
            $insert = [
                'id_jenis'=>$j,
                'nama' => $nama,
                'id_ruasjalan' => $ruas,
                'status' => $status,
                'kondisi' => $kondisi,
                'lokasi'=>'',
                'coordinate_lat'=>$lat,
                'coordinate_lng'=>$lng,
                'posisi'=>$posisi,
                'keterangan'=>$keterangan,
                'gambar'=>$namafilebar,
                'foto'=>$namafilebaru,
                ];
            $ins = $this->db->table('perlengkapan_jalan')->insert($insert);
//            return redirect()->back()->with('success', '1');
        }
    }
    function data($jenis=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
//        $menu=new MenuModel();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        if ($jenis==null){
            $a=$this->db->table('jenis_perlengkapan')->get()->getRow();
            return redirect()->to(base_url('admin/perlengkapan/data/').'/'.$a->id);
        }
        $footerdata['jeniss']=$jenis;
        echo view('admin/template/header', $menu);
        echo view('admin/perlengkapanjalan');
        echo view('admin/template/footer', $footerdata);
    }
    function addjenis($jenis=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
//        $data['jenis']=$this->db->table('jenis_perlengkapan A')->select("A.*, B.nama subs")->join('jenis_perlengkapan B', 'A.id=B.sub', 'Left')->get()->getResult();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $data['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/formtambahjenis',$data);
        echo view('admin/template/footer');
    }
    function savejenis(){
        if ($this->request->getMethod() !== 'post') {
//            return redirect()->back();
            echo '2';
        }

        $validated = $this->validate([
            'lampiran' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/gif,image/png]|max_size[lampiran,8192]'
        ]);

        if ($validated == FALSE) {
            echo "123";
            // Kembali ke function index supaya membawa data uploads dan validasi
            return redirect()->back();

        } else {
            $lam = $this->request->getFile('lampiran');
//            echo ;
            $namafilebaru = $lam->getRandomName();

            $lam->move(ROOTPATH . '/assets/images/jenis', $namafilebaru);
            $jenis = $this->request->getPost('jenis');
            $suba = $this->request->getPost('sub');
            if ($suba==''){
                $sub=null;
            }else{
                $sub=$suba;
            }
            $keterangan = $this->request->getPost('keterangan');
            $insert = [
                'nama' => $jenis,
                'gambar' => $namafilebaru,
                'sub' => $sub,
                'keterangan' => $keterangan,
                 ];
            $ins = $this->db->table('jenis_perlengkapan')->insert($insert);
            return redirect()->back()->with('success', '1');
        }
    }
    function jenis(){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
        $data['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/jenis',$data);
        echo view('admin/template/footer');
    }
    function get_jenisPerlengkapan($jenis=null){

        $request = Services::request();
        $m_icd = new Load_Perlengkapan($request, $jenis);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
//            $WhereAll
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->id_ruasjalan;
                $row[] = $list->kondisi;
                $row[] = $list->lokasi;
                $row[] = $list->posisi;
                $row[] = 'Lat : '.$list->coordinate_lat.'<br>Lng : '.$list->coordinate_lng;

                $row[] = '<div class="btn-group">
                            <button type="button" class="btn bg-navy">Action</button>
                            <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="'.base_url('wali/siswa/edit/'.$list->id_siswa).'"><i class="fa fa-edit"></i> Edit</a></li>
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


}