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
        $jenisper['garambu']=$this->db->table('gambar_rambu')->get()->getResult();
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
//            echo "123";
            // Kembali ke function index supaya membawa data uploads dan validasi
//            return redirect()->back();

            $lamp = '';
            $namafilebar = '';

        } else {

            $lamp = $this->request->getFile('lampiran');
            $namafilebar = $lamp->getRandomName();
            $lamp->move(ROOTPATH . '/uploads/lampiran', $namafilebar);
        }
            $lam = $this->request->getFile('fotolokasi');
//            echo ;
            $namafilebaru = $lam->getRandomName();

            $lam->move(ROOTPATH . '/uploads/perlengkapan', $namafilebaru);

            $ruas = $this->request->getPost('ruasjalan');
            $lat = $this->request->getPost('lat');
            $lng = $this->request->getPost('lng');
            $posisi = $this->request->getPost('posisi');
            $jenisperlengkapan = $this->request->getPost('jenisperlengkapan');
            $jenisrambu = $this->request->getPost('jenisrambu');

            $kondisi = $this->request->getPost('kondisi');
            $status = $this->request->getPost('status');
            $status = $this->request->getPost('status');
            $keterangan = $this->request->getPost('keterangan');
            $id_grambu=$this->request->getPost('id_grambu');
            if ($jenisrambu==''){
                $j=$jenisperlengkapan;
            }else{
                $j=$jenisrambu;
            }
            $keterangan = $this->request->getPost('keterangan');
            $nama = $this->request->getPost('nama');
            if($jenisperlengkapan==4){

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
                    'id_gambar'=>$id_grambu,
                    'foto'=>$namafilebaru,
                ];
            }else{
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
            }
            $ins = $this->db->table('perlengkapan_jalan')->insert($insert);
            return redirect()->back()->with('success', '1');

    }
    function data($jenis=null){
        if (empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin/auth'));
        }
//        $menu=new MenuModel();
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        if ($jenis==null){
            $a=$this->db->table('jenis_perlengkapan')->get()->getRow();
            return redirect()->to(base_url('admin/perlengkapan/data/').'/'.$a->id);
        }
        if($jenis!=4) {
//            $jenis=0;
            $kebutuhan = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('status', 'K')->get()->getRow();
            $total = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->get()->getRow();
            $hilang = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('kondisi', 'Hilang')->get()->getRow();
            $rusak = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('kondisi', 'Rusak')->get()->getRow();
            $last=$this->db->table('perlengkapan_jalan')->where('id_jenis', $jenis)->orderBy('tgl_insert', 'DESC')->get()->getRow();

        }else{
            $kebutuhan = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('status', 'K')->get()->getRow();
            $total = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->get()->getRow();
            $hilang = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('kondisi', 'Hilang')->get()->getRow();
            $rusak = $this->db->table('perlengkapan_jalan')->select('count(id) as total')->where('id_jenis', $jenis)->where('kondisi', 'Rusak')->get()->getRow();
            $last=$this->db->table('perlengkapan_jalan')->join('jenis_perlengkapan', 'perlengkapan_jalan.id_jenis=jenis_perlengkapan.id', 'inner')->where('jenis_perlengkapan.id', $jenis)->orWhere('jenis_perlengkapan.sub', $jenis)->orderBy('tgl_insert', 'DESC')->get()->getRow();
        }
        $data['jenisperlengkapan']=$this->db->table('jenis_perlengkapan')->select('nama')->where('id', $jenis)->get()->getRow()->nama;
        $data['kebutuhan']=$kebutuhan;
        $data['total']=$total;
        $data['hilang']=$hilang;
        $data['rusak']=$rusak;
        $data['jenis']=$jenis;
        $data['last']=$last;
        $footerdata['jeniss']=$jenis;
        echo view('admin/template/header', $menu);
        echo view('admin/perlengkapanjalan', $data);
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

                $ruas=$this->db->table('ruas_jalan')->select('nama_ruas')->where('id',$list->id_ruasjalan)->get()->getRow();
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $ruas->nama_ruas;
                $row[] = $list->kondisi;
                $row[] = $list->lokasi;
                $row[] = $list->posisi;
                $row[] = 'Lat : '.$list->coordinate_lat.'<br>Lng : '.$list->coordinate_lng;

                $row[] = '<div class="btn-group">
                            <a href="/admin/perlengkapan/detail/'.$list->id.'" type="button" class="btn btn-default bg-navy">Action</a>
                            <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="disabled"><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
                                <li id="hapusperlengkapan" data-id="'.$list->id.'" data-name="'.$list->nama.'" style="padding-left: 8px"><i class="fa fa-trash"></i> Hapus</li>
                                
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
    function blob()
    {
        $dbs=$this->db->table('gambar_rambu');
        foreach (glob( '/var/www/html/webgispju/public/uploads/rambu/*.png') as $file) {
            $a=str_replace('/var/www/html/webgispju/public/uploads/rambu/', '', $file);
            $array=array('nama'=>$a,'gambar_rambu'=>$a);
            $dbs->insert($array);
        }
    }
    function edit($id=null){

    }
    function delete($id=null){
        if($id==null){
            $resp['res']='fail';
        }else{
            $i=$this->db->table('perlengkapan_jalan')->delete(['id' => $id]);
            if ($i){
                $resp['res']='success';
            }else{
                $resp['res']='fail';
            }
        }
        echo json_encode($resp);
    }
    function detail($id=null){
        if($id==null){
            return redirect()->to('/admin/perlengkapan');
        }


        $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
        $terpasang=$this->db->table('pju')->where('id_perlengkapan_jalan', $id)->get()->getRow();
//        var_dump($terpasang);
        if(empty($terpasang)){
            $terpasangs= "tidak Terpasang / Belum disurvey";
            $infos=null;

            $data['idpel']='-';
        }else{
            $infos=1;
            $data['tagihan']=$this->db->query("SELECT *, total_pembayaran as totall FROM tagihan WHERE id_pel='".$terpasang->id_pel."' AND blth LIKE '".date('Y-m')."%'")->getRow();
            $terpasangs= "terpasang";
            $data['idpel']=$data['tagihan']->id_pel;
//            echo $terpasang->id_perlengkapan_jalan;

        }
        $info=$this->db->table('perlengkapan_jalan')->join('jenis_perlengkapan', 'perlengkapan_jalan.id_jenis=jenis_perlengkapan.id')->join('ruas_jalan', 'ruas_jalan.id= perlengkapan_jalan.id_ruasjalan', 'inner')->select('*, ruas_jalan.id as id_ruas, jenis_perlengkapan.id as idjenis, jenis_perlengkapan.nama as nama_jenis')->where('perlengkapan_jalan.id', $id)->get()->getRow();
        $data['info']=$info;
        $data['terpasang']=$terpasangs;
        $data['infos']=$infos;
        if ($info->id_jenis==4 || $info->sub==4){
            $icon=$this->db->table('gambar_rambu')->where('id_gambar',$info->id_gambar)->get()->getRow()->gambar_rambu;
        }else{
            $icon=null;
        }


        $data['icons']=$icon;
        echo view('admin/template/header', $menu);
        echo view('admin/detailperlengkapan',$data);
        echo view('admin/template/footer');
    }
}