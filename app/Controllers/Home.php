<?php namespace App\Controllers;

use App\Models\PengaduanModel;
use phpDocumentor\Reflection\Types\AbstractList;

class Home extends BaseController
{
	public function index()
	{
	    // $item->nama
        $data['pengaduan']=$this->db->table('pengaduan')->select('pengaduan.*')->join('perlengkapan_jalan', 'perlengkapan_jalan.id = pengaduan.id_perlengkapan')->where('pengaduan.status >=',1)->orderBy('id_pengaduan', 'DESC')->limit(6)->get()->getResult();

        $dataa['aktif']='';
        $data['rambu']=$this->db->table('perlengkapan_jalan')->selectCount('perlengkapan_jalan.id')->join('jenis_perlengkapan', 'jenis_perlengkapan.id = perlengkapan_jalan.id_jenis')->where('jenis_perlengkapan.sub', 4)->get()->getRow()->id;
        
        $data['lpju']=$this->db->table('perlengkapan_jalan')->selectCount('id')->where('id_jenis', 3)->get()->getRow()->id;
        
        $data['apill']=$this->db->table('perlengkapan_jalan')->selectCount('id')->where('id_jenis', 1)->get()->getRow()->id;
        $data['marka']=$this->db->table('perlengkapan_jalan')->selectCount('id')->where('id_jenis', 5)->get()->getRow()->id;
        echo view('template/header1', $dataa);
        echo view('homepage', $data);
	}
    public function contact()
    {

        $dataa['aktif']='kontak';
        echo view('template/header1', $dataa);
        echo view('contact');
    }
    public function pengaduan($id=null){
	    if ($id ==null){
            $model = new PengaduanModel();
            $data = [
                'pengaduan' => $model->select('pengaduan.*')->join('perlengkapan_jalan', 'perlengkapan_jalan.id = pengaduan.id_perlengkapan')->where('pengaduan.status >=', 1)->asObject()->paginate(6),
                'pager' => $model->pager
            ];
//            var_dump($data['pager']->links());
            $dataa['aktif']='peng';
            echo view('template/header1', $dataa);
            echo view('pengaduan_h', $data);
//            var_dump($model->pager->links());
        }else{
            $dataa['aktif']='peng';
            echo view('template/header1', $dataa);
            $pengaduan=$this->db->table('pengaduan')->select('*, pengaduan.status as statuspengaduan, pengaduan.nama as nama, pengaduan.foto as fotolap, perlengkapan_jalan.id as idperl, ruas_jalan.id as idruaas, perlengkapan_jalan.nama as nama_perlengkapan')->join('perlengkapan_jalan', 'pengaduan.id_perlengkapan=perlengkapan_jalan.id', 'inner')->join('ruas_jalan', 'perlengkapan_jalan.id_ruasjalan=ruas_jalan.id', 'inner')->where('id_pengaduan', $id)->get()->getRow();
            $data['pengaduan']=$pengaduan;
            echo view('template/header1', $dataa);
            echo view('detail_pengaduan', $data);
        }
    }

    public function inputpengaduan($id=null){
        if($id==null){
	        $idp=0;
        }else{
	        $idp=$id;
        }
        $data['idp']=$idp;
        $d['aktif']='peng';
        echo view('template/header1', $d);
        echo view('inputpengaduann', $data);
    }
    function savepengaduan()
    {
        if ($this->request->getMethod() !== 'post') {
//            return redirect()->back();
            echo '2';
        }

        
            $lam = $this->request->getFile('lampiran');

            $namafilebaru = $lam->getRandomName();

            $lam->move(ROOTPATH . '/uploads/pengaduan', $namafilebaru);
            $id_perlengkapan = $this->request->getPost('id_perl');
            $nama = $this->request->getPost('name');
            $wa = $this->request->getPost('wa');
            $nik = $this->request->getPost('nik');
            $pengaduan = $this->request->getPost('laporan');
            $insert = [
                'nama' => $nama,
                'nik' => $nik,
                'wa' => $wa,
                'isilaporan' => $pengaduan,
                'id_perlengkapan' => $id_perlengkapan,
                'foto' => $namafilebaru,
                'tgl_pengaduan' => date('Y/m/d')
            ];
            $ins = $this->db->table('pengaduan')->insert($insert);
            return redirect()->back()->with('success', '1');
//            var_dump($ins);
        
    }
    public function aspirasi(){
        return view('ac');
    }

	//--------------------------------------------------------------------

}
