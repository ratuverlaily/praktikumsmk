<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_modul extends Model
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
}
