<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Mg_kelas extends Model
{
    var $table = 'kelas';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('kelas');
    }

    public function get_all_kelas()
    {
        $id = user()->id;
        $query = $this->db->query('select * from kelas where id_user =' . $id);
        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from kelas where id_kelas =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function search_kodekelas_by_id($kode)
    {
        $sql = "select * from kelas where kode ='" . $kode . "'";
        $query =  $this->db->query($sql);
        return $query->getRow();
    }

    public function get_onkelas()
    {
        $id = user()->id;
        $sql = "select * from kelas where status_aktif = 1 and id_user=" . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function kelas_add($data)
    {

        $query = $this->db->table($this->table)->insert($data);
        //return $this->db->insertID();
    }

    public function kelas_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
        //return $this->db->affectedRows();
    }

    public function updateStatus($id)
    {
        $data = array(
            'status_aktif' => 0,
        );
        $this->db->table($this->table)->update($data);

        $data2 = array(
            'status_aktif' => 1,
        );

        $this->db->table($this->table)->update($data2, array('id_kelas' => $id));
    }

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('id_kelas' => $id));
    }
}
