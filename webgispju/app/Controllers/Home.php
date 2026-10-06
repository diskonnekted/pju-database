<?php namespace App\Controllers;

use App\Models\PengaduanModel;
use phpDocumentor\Reflection\Types\AbstractList;

class Home extends BaseController
{
	public function index()
	{
	    // $item->nama
        $data['pengaduan']=$this->db->table('pengaduan')->orderBy('id_pengaduan', 'DESC')->limit(6)->get()->getResult();

        $dataa['aktif']='';
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
                'pengaduan' => $model->asObject()->paginate(6),
                'pager' => $model->pager
            ];
//            var_dump($data['pager']->links());
            $dataa['aktif']='peng';
            echo view('template/header1', $dataa);
            echo view('pengaduan_h', $data);
//            var_dump($model->pager->links());
        }else{
            $pengaduan=$this->db->table('pengaduan')->where('id_pengaduan', $id)->get()->getResult();
//            var_dump($pengaduan);
//            $data
            echo view('ac');
        }
    }

    public function inputpengaduan(){
        $d['aktif']='peng';
        echo view('template/header1', $d);
        echo view('inputpengaduann');
    }
    function savepengaduan()
    {
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
            return redirect()->back()->with('success', '2');

        } else {
            $lam = $this->request->getFile('lampiran');

            $namafilebaru = $lam->getRandomName();

            $lam->move(ROOTPATH . 'public/uploads/pengaduan', $namafilebaru);
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
    }
    public function aspirasi(){
        return view('ac');
    }

	//--------------------------------------------------------------------

}
