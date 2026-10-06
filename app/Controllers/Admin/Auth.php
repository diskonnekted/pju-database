<?php


namespace App\Controllers\Admin;


class Auth extends AdminController
{
    function index(){
        if (!empty($_SESSION['logedinBNA'])){
            return redirect()->to(base_url('admin'));
        }
        echo view('admin/login');
    }
    function Login(){
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        if (empty($username)){
            $this->index();
        }else{

            $login=$this->db->table('user')->where('username', $username)->get()->getRow();
            if (password_verify($password, $login->password)){

                $userdata= [
                    'username'  => $login->username,
                    'nama'     => $login->nama,
                    'jabatan' => $login->jabatan,
                    'profil' => $login->profil,
                    'loginas' => $login->status,
                    'logedinBNA' => TRUE
                ];
                $this->session->set($userdata);
                if  ($login->status==1){
                    
                
                return redirect()->to(base_url('admin'));
                }else{
                    return redirect()->to(base_url('admin/pju/survey'));
                }
            }else{
                return redirect()->to(base_url('admin/auth'))->with('error', 'Pastikan Kombinasi Username dan Sassword Sesuai');
            }

        }
    }
    function getPpassword(){
        echo password_hash('admin123', PASSWORD_DEFAULT);

    }
    function logout(){
        session()->destroy();
        return redirect()->to(base_url('admin/auth'));
    }
}
