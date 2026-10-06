<?php


namespace App\Models;


use CodeIgniter\HTTP\RequestInterface;

class LoadPengaduan extends \CodeIgniter\Model
{

    protected $table = "pengaduan";
    protected $column_order = array('id_pengaduan', 'nama', 'nik', 'wa', 'isilaporan', 'lampiran', 'status', 'lokasi', 'id_perlengkapan', 'foto', 'tgl_pengaduan', 'jenis');
    protected $column_search = array('id_pengaduan', 'nama', 'nik', 'wa', 'isilaporan', 'lampiran', 'status', 'lokasi', 'id_perlengkapan', 'foto', 'tgl_pengaduan', 'jenis');
    protected $order = array('tgl_pengaduan' => 'DESC');
    protected $request;
    protected $db;
    protected $dt;
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        error_reporting(0);
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
        $this->dt->select('*, pengaduan.status as status_pengaduan');
        $this->dt->join('(SELECT perlengkapan_jalan.id_ruasjalan as id_ruasjalan, jenis_perlengkapan.id as idjenis, perlengkapan_jalan.id as idprl, jenis_perlengkapan.nama as nama_jenis, perlengkapan_jalan.nama as nama_perlengakapan, perlengkapan_jalan.status as pjjenis FROM perlengkapan_jalan INNER JOIN jenis_perlengkapan on perlengkapan_jalan.id_jenis = jenis_perlengkapan.id) as pjalan', 'pengaduan.id_perlengkapan=pjalan.idprl', 'inner');
//        $this->dt->join('ruas_jalan', 'pjalan.id_ruasjalan=ruas_jalan.id', 'inner');
    }

    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));

        $query = $this->dt->get();
        return $query->getResult();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }

    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }


}