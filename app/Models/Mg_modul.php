<?php

namespace App\Models;

use CodeIgniter\Model;

class Mg_modul extends Model
{
    var $table = 'modul';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('modul');
    }

    public function get_all_modul()
    {
        //       $query = $this->db->table('modul');
        $query = $this->db->query('select * from modul');
        //      print_r($query->getResult());
        // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from modul where id_modul =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function modul_add($data)
    {

        $query = $this->db->table($this->table)->insert($data);
        //return $this->db->insertID();
    }

    public function modul_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
        //return $this->db->affectedRows();
    }

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('id_modul' => $id));
    }
}
