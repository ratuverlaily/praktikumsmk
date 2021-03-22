<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_praktikum extends Model
{
    var $table = 'praktikum';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('praktikum');
    }

    public function get_all_praktikum()
    {
        //       $query = $this->db->table('praktikum');
        $query = $this->db->query('select * from praktikum');
        //      print_r($query->getResult());
        // $query = $this->db->get();
        return $query->getResult();
    }
}
