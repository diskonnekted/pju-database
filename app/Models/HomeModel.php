<?php


namespace App\Models;


class HomeModel extends \CodeIgniter\Model
{
    function GetRuas($searchTerm=""){

        // Fetch users
        $tab=$this->db->table('ruas_jalan')->Where("nama_ruas like '%".$searchTerm."%' ");
        $tab->Where("titik_awal like '%".$searchTerm."%' ");
        $tab->getWhere("titik_akhir like '%".$searchTerm."%' ");

        $ruas =$tab->get()->getResultArray();

        // Initialize Array with fetched data
        $data = array();
        foreach($ruas as $ruas){
            $data[] = array("id"=>$ruas['id'], "text"=>$ruas['nama_ruas']);
        }
        return $data;
    }

}