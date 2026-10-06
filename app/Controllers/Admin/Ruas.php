<?php


    namespace App\Controllers\Admin;


    use App\Models\Load_Perlengkapan;
    use App\Models\LoadRuas;
    use Config\Services;

    class Ruas extends AdminController
    {
        function index(){
            if (empty($_SESSION['logedinBNA'])){
                return redirect()->to(base_url('admin/auth'));
            }
            $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
            echo view('admin/template/header', $menu);
            echo view('admin/ruas');
            echo view('admin/template/footer');
        }
        function tambah(){
            if (empty($_SESSION['logedinBNA'])){
                return redirect()->to(base_url('admin/auth'));
            }

            $menu['jenis']=$this->db->table('jenis_perlengkapan')->get()->getResult();
            $f['page']='addruas';
            echo view('admin/template/header', $menu);
            echo view('admin/addRuas');
            echo view('admin/template/footer',$f);
        }
        function simpan(){
            if (empty($_SESSION['logedinBNA'])){
                return redirect()->to(base_url('admin/auth'));
            }
            $norut=$this->request->getPost('norut');
            $jenisjalan=$this->request->getPost('jenisjalan');
            $noruas=$this->request->getPost('noruas');
            $namaruas=$this->request->getPost('namaruas');
            $tawal=$this->request->getPost('tawal');
            $takhir=$this->request->getPost('takhir');
            $awlat=$this->request->getPost('awlat');
            $awlng=$this->request->getPost('awlng');
            $aklat=$this->request->getPost('aklat');
            $aklng=$this->request->getPost('aklng');
            $panjang=$this->request->getPost('panjang');
            $lebar=$this->request->getPost('lebar');
            $kelasjalan=$this->request->getPost('kelasjalan');
            $data=[
                'norut'=>$norut,
                'nomor_ruas'=>$noruas,
                'jenis'=>$jenisjalan,
                'nama_ruas'=>$namaruas,
                'titik_awal'=>$tawal,
                'titik_akhir'=>$takhir,
                'from_lat'=>$awlat,
                'from_lng'=>$awlng,
                'to_lat'=>$aklat,
                'to_lng'=>$aklng,
                'panjang'=>$panjang,
                'lebar'=>$lebar,
                'kelas'=>$kelasjalan
            ];
            $this->db->table('ruas_jalan')->insert($data);
            return redirect()->back();
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
                    $row[] = $list->from_lat.', '.$list->from_lng;
                    $row[] = $list->to_lat.', '.$list->to_lng;
                    $row[] = 'Lat : '.$list->from_lat.'<br>Lng : '.$list->from_lng;
                    $row[] = 'Lat : '.$list->to_lat.'<br>Lng : '.$list->to_lng;
                    $row[] = $list->id;
                    $data[] = $row;
                }
                $output = ["draw" => $request->getPost('draw'),
                    "recordsTotal" => $m_icd->count_all(),
                    "recordsFiltered" => $m_icd->count_filtered(),
                    "data" => $data];
                echo json_encode($output);
            }
        }
        function delete($id=null){
            if($id==null){
                $resp['res']='fail';
            }else{
                $i=$this->db->table('ruas_jalan')->delete(['id' => $id]);
                if ($i){
                    $resp['res']='success';
                }else{
                    $resp['res']='fail';
                }
            }
            echo json_encode($resp);
        }
        function edit($id=null){
            if($id==null){
                $resp['res']='fail';
            }else{
                $ids='1233333';
                $i=$this->db->table('ruas_jalan')->delete(['id' => $ids]);
                if ($i){
                    $resp['res']='success';
                }else{
                    $resp['res']='fail';
                }
            }
            echo json_encode($resp);
        }
    }