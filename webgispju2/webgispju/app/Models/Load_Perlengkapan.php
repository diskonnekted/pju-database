<?php


namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Load_Perlengkapan extends Model
{
    protected $table = "perlengkapan_jalan";
    protected $column_order = array('nama');
    protected $column_search = array('nama');
    protected $order = array('nama' => 'asc');
    protected $request;
    protected $WhereAll;
    protected $db;
    protected $dt;
    function __construct(RequestInterface $request, $WhereAll){
        parent::__construct();
        error_reporting(0);
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
        if (isset($WhereAll) != null){
            $this->dt->where('id_jenis',$WhereAll);
        }
    }
    private function _get_datatables_query(){
        $i = 0;
        foreach ($this->column_search as $item){
            if($this->request->getPost('search')['value']){
                if($i===0){
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                }
                else{
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if($this->request->getPost('order')){
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        }
        else if(isset($this->order)){
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables(){
        $this->_get_datatables_query();
        if($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));

        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered(){
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    public function count_all(){
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}