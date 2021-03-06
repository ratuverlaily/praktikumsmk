<?php

namespace App\Models;

use CodeIgniter\Model;

class Mg_praktikum extends Model
{
    var $table = 'praktikum';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('praktikum');
    }

    public function getlastid()
    {
        $query = $this->db->query('SELECT id_praktikum as id FROM `praktikum` order by id_praktikum DESC limit 1');
        return $query->getRow();
    }

    public function get_all_praktikum()
    {
        //       $query = $this->db->table('praktikum');
        $query = $this->db->query('select * from praktikum');
        //      print_r($query->getResult());
        // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from praktikum where id_praktikum =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function get_all_by_id($id)
    {
        $sql = 'SELECT * FROM `praktikum_dikelas` as a INNER JOIN praktikum as b ON a.id_praktikum = b.id_praktikum where a.id_kelas =' . $id;
        $query =  $this->db->query($sql);
        return $query->getResult();
    }

    public function praktikum_add($data)
    {

        $query = $this->db->table($this->table)->insert($data);
        //return $this->db->insertID();
    }

    public function praktikum_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
        //return $this->db->affectedRows();
    }

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('id_praktikum' => $id));
    }
}
