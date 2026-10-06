<?php


namespace App\Controllers\Admin;


class User extends AdminController
{
    function index(){
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        $data['user']=$this->db->Table('user')->where('username !=',$_SESSION['username'])->get()->getResult();
        echo view('admin/template/header', $menu);
        echo view('admin/user',$data);
        echo view('admin/template/footer');
    }
    function edit($id=null){
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        $data['user']=$this->db->Table('user')->where('id_user',$id)->get()->getRow();
        $data['edit']=1;
        echo view('admin/template/header', $menu);
        echo view('admin/adduser', $data);
        echo view('admin/template/footer');
    }
    function addUser(){
        $menu['jenis']=$this->db->table('jenis_perlengkapan')->where('sub', null)->get()->getResult();
        $data['user']=$this->db->Table('user')->where('username !=',$_SESSION['username']);
        echo view('admin/template/header', $menu);
        echo view('admin/adduser');
        echo view('admin/template/footer');
    }
    function saveUser(){
        $id=$this->request->getPost('id');
        $username=$this->request->getPost('username');
        $p=$this->request->getPost('password');
        $password=password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $nama=$this->request->getPost('nama');
        $level=$this->request->getPost('level');
        $jabatan=$this->request->getPost('jabatan');
        $data=array('username'=>$username, 'password'=>$password,
        'nama'=>$nama, 'jabatan'=>$jabatan, 'status'=>$level);
        $level=$this->request->getPost('level');
        if ($id==null){
            $a=$this->db->table('user')->insert($data);
            if ($a){
                $ret=1;
            }else{
                $ret=0;
            }
        }else{
             $data2=array('username'=>$username,  'nama'=>$nama, 'jabatan'=>$jabatan, 'status'=>$level);
            if (empty($p)){
                $this->db->table('user')->where('id_user', $id)->update($data2);
                $ret=1;
            }else{
                $this->db->table('user')->where('id_user', $id)->update($data);

                $ret=1;
            }

        }
        if ($ret==1){
            return redirect()->back()->with('sts', 1);
        }else{
            return redirect()->back()->with('sts', 2);
        }
    }
    function hapus($id=null){
            $this->db->table('user')->delete(['id_user' => $id]);
            return redirect()->back()->with('sts', 1);
    }

}