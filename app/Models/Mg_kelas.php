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
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('kelas');
    }

    public function get_all_kelas()
    {
        //       $query = $this->db->table('kelas');
        $query = $this->db->query('select * from kelas');
        //      print_r($query->getResult());
        // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from kelas where id_kelas =' . $id;
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

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('id_kelas' => $id));
    }
}
