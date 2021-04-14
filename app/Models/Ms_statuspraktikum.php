<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_statuspraktikum extends Model
{
    var $table = 'statuspraktikum';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('statuspraktikum');
    }
    public function statuspraktikumadd($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }
}
