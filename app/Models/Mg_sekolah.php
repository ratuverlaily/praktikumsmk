<?php

namespace App\Models;

use CodeIgniter\Model;

class Mg_sekolah extends Model
{
    var $table = 'sekolah';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('sekolah');
    }

    public function get_all_sekolah($id)
    {
        //       $query = $this->db->table('sekolah');
        $query = $this->db->query('select * from sekolah where id_guru =' . $id);
        //print_r($query->getResult()); 
        // $query = $this->db->get();
        return $query->getRow();
    }

    public function sekolah_add($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        //return $this->db->insertID();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from sekolah where id_sekolah =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function sekolah_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
        //return $this->db->affectedRows();
    }
}
