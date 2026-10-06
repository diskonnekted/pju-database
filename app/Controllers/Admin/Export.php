<?php


namespace App\Controllers\Admin;


use org\bovigo\vfs\content\FileContent;

class Export extends AdminController
{
        function idpel(){

            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Data ID Pelanggan.xls");
            echo "<center><h4> Data Rambu</h4></center>";
            $idpellust=$this->db->table('idpel_terpasang')->join('(SELECT id_pel FROM pju GROUP BY id_pel) as pju', 'idpel_terpasang.idpel=pju.id_pel', 'left')->groupBy('idpel_terpasang.idpel')->get()->getResult();
            $data['idpel']=$idpellust;
            echo view('admin/excel/idpel', $data);
        }
        function perlengkapan($jenis=1){

            if ($jenis==4){
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Data Rambu.xls");
                echo "<center> Data Rambu</center>";
                $res=$this->db->query("SELECT *,jenis_perlengkapan.nama as nama_jenis,  jenis_perlengkapan.id as idjenisa, ruas_jalan.id as rid FROM perlengkapan_jalan INNER JOIN jenis_perlengkapan on perlengkapan_jalan.id_jenis=jenis_perlengkapan.id inner join ruas_jalan on perlengkapan_jalan.id_ruasjalan=ruas_jalan.id WHERE jenis_perlengkapan.sub='$jenis'")->getResult();
                $data['data']=$res;
                echo view('admin/excel/rambu', $data);
            }else if($jenis==3){
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Data Lampu PJU.xls");
                echo "<center> Data Lampu PJU</center>";
                $idpellust=$this->db->query("SELECT *, b.nama as namaidpel,  a.id as id, b.id as id FROM (SELECT perlengkapan_jalan.*, perlengkapan_jalan.nama as namaperl, pju.*, ruas_jalan.id as idre, ruas_jalan.nama_ruas as namaruas FROM `perlengkapan_jalan` LEFT JOIN ruas_jalan on perlengkapan_jalan.id_ruasjalan=ruas_jalan.id LEFT JOIN pju on pju.id_perlengkapan_jalan=perlengkapan_jalan.id where id_jenis=3 ) as a LEFT JOIN idpel_terpasang as b on a.id_pel=b.idpel LEFT join lmandiri on a.id_pju=lmandiri.id_pju")->getResult();
                $data['idpel']=$idpellust;
                echo view('admin/excel/pju', $data);
            }else{
                $jeniss=$this->db->table('jenis_perlengkapan')->where('id', $jenis)->get()->getRow();
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Data Perlengkapan Jenis ".$jeniss->nama.".xls");
                echo "<center> Data Perlengkapan Jenis ".$jeniss->nama."</center>";
                $res=$this->db->query("SELECT *,jenis_perlengkapan.nama as nama_jenis,  jenis_perlengkapan.id as idjenisa, ruas_jalan.id as rid FROM perlengkapan_jalan INNER JOIN jenis_perlengkapan on perlengkapan_jalan.id_jenis=jenis_perlengkapan.id inner join ruas_jalan on perlengkapan_jalan.id_ruasjalan=ruas_jalan.id WHERE id_jenis='$jenis'")->getResult();
                $data['data']=$res;
                echo view('admin/excel/perlengkapan', $data);
            }
        }
}